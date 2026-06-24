import re
import json
from pathlib import Path

_embedder = None
def get_embedder(): 
    global _embedder
    if _embedder is None:
        import os
        os.environ['HF_HUB_OFFLINE'] = '1'
        os.environ['TRANSFORMERS_OFFLINE'] = '1'
        os.environ['OMP_NUM_THREADS'] = '1'
        os.environ['OPENBLAS_NUM_THREADS'] = '1'
        os.environ['MKL_NUM_THREADS'] = '1'
        
        from sentence_transformers import SentenceTransformer
        from pathlib import Path
        model_dir = Path(__file__).resolve().parents[1] / 'model_resource' / 'sbert_miniLM'
        _embedder = SentenceTransformer(str(model_dir), device='cpu')
    return _embedder

class TextProcessor:
    # Kata navigasi/kontekstual yang dihapus saat pencarian ruangan
    STOP = {"dimana","lokasi","cari","arah","rute","cara","ke","posisi","letak",
            "mana","dimanakah","temukan","tunjukkan","tolong","bantu","info",
            "rsj","rs","tampan","rumah","sakit","di","dari","ada",
            "apa","yang","dan","atau","saya","mau","ingin","ya","sih","saja",
            "melakukan","harus","kemana","buat","dong","deh","nih","ini","itu",
            "lah","kan","tuh","nya","kah","pun","juga","kok","yuk","yg",
            "minta","tolong","bantu","kasih","tau","tahu","dong","please",
            "bisa","boleh","perlu","butuh","pengen","mo","mw"}
    PREF = {"ruang","ruangan","kamar","kantor","klinik","poli","toilet","mushola","gedung","instalasi"}

    # Kata kunci penanda user sedang mencari lokasi/ruangan (untuk override intent)
    NAV_WORDS = {"dimana","lokasi","cari","arah","rute","mana","letak","posisi",
                 "menuju","kemana","tempat","nyari","tunjukkan","carikan","ketemu"}

    # Kata kunci penanda query berkaitan dengan fasilitas RS (bukan random chat)
    FACILITY_WORDS = {"kantin","makan","toilet","wc","mushola","sholat","shalat",
                      "farmasi","apotek","obat","lab","laboratorium","poli","klinik",
                      "igd","rawat","inap","parkir","arsip","dokter","magang","diklat",
                      "gizi","radiologi","x-ray","pendaftaran","daftar","loket",
                      "kasir","bayar","rehab","rehabilitasi","konsultasi","psikiatri",
                      "psikologi","jiwa","saraf","bedah","anak","gigi","kulit",
                      "kamar","ruang","ruangan","gedung","lantai","bangsal","satpam",
                      "resepsionis","informasi","pengaduan","jenazah","genset","server",
                      "laundry","linen","dapur","meeting","rapat","aula","gudang",
                      "ibadah","sembahyang","solat","minum","haus","lapar","laper",
                      "ngemil","jajan","mandi","kencing","berak","beol","bab",
                      "direktur","wadir","kepala","bidang","bagian","instalasi",
                      "perawat","suster","humas","komite","iprs","cssd","pkm",
                      "depo","hemodialisa","fisioterapi","ekg","vct","isolasi"}

    def __init__(self, slang=None):
        self.slang = slang
        if self.slang is None:
            try:
                path = Path(__file__).resolve().parents[1] / 'model_resource' / 'slang.json'
                self.slang = json.loads(path.read_text(encoding='utf-8'))
            except Exception:
                self.slang = {}
            
        self.multi_slang = sorted([(k,v) for k,v in self.slang.items() if ' ' in k], key=lambda x: len(x[0]), reverse=True)
        self.stop_words = self.STOP

    def clean_text(self, text, use_slang=True):
        """Bersihkan teks: lowercase, hapus simbol, normalisasi slang."""
        if not text: 
            return ""
        text = re.sub(r'[^a-z0-9\s]', ' ', str(text).lower()).strip()
        if not use_slang: 
            return " ".join(text.split())
        for slang_word, formal_word in self.multi_slang:
            text = re.sub(r'\b' + re.escape(slang_word) + r'\b', formal_word, text)
        return " ".join(self.slang.get(word, word) for word in text.split())

    def remove_stopwords(self, text):
        """Hapus stopwords navigasi, sisakan kata benda inti."""
        return " ".join(word for word in text.split() if word not in self.STOP) if text else ""

    def strip_prefix(self, text):
        """Hapus prefix umum ruangan (ruang, kamar, dll)."""
        word_list = text.split()
        while word_list and word_list[0] in self.PREF: 
            word_list = word_list[1:]
        return " ".join(word_list)

    def get_tokens(self, text):
        """Memecah teks menjadi token unik. Dipakai sentralistik untuk Training dan Searching agar konsisten."""
        if not text: return set()
        q_raw_tokens = set(re.sub(r'[^a-z0-9\s]', ' ', str(text).lower()).split())
        q_slang = self.clean_text(text, use_slang=True).lower()
        q_no_slang = self.clean_text(text, use_slang=False).lower()
        q_stop = self.remove_stopwords(q_slang) or q_slang
        q_pref = self.strip_prefix(q_stop)
        return set(q_stop.split() + q_no_slang.split() + q_pref.split()) | (q_raw_tokens - self.stop_words)

    def process_query(self, message):
        """Pusat pemrosesan teks. Membersihkan teks 1 kali saja untuk dipakai di semua fungsi."""
        q_raw_lower = message.lower().strip()
        q_slang = self.clean_text(message, use_slang=True).lower()
        q_no_slang = self.clean_text(message, use_slang=False).lower()
        q_stop = self.remove_stopwords(q_slang) or q_slang
        q_pref = self.strip_prefix(q_stop)
        q_raw_tokens = set(re.sub(r'[^a-z0-9\s]', ' ', q_raw_lower).split())
        
        # Menggunakan metode tokenisasi tunggal untuk mencegah mismatch
        tokens = self.get_tokens(message)
        
        has_nav = bool(set(q_slang.split()) & self.NAV_WORDS)
        has_fac = bool((q_raw_tokens | set(q_slang.split())) & self.FACILITY_WORDS)
        
        return {
            'raw': message.strip(),
            'q_raw_lower': q_raw_lower,
            'q_slang': q_slang,
            'q_no_slang': q_no_slang,
            'q_stop': q_stop,
            'q_pref': q_pref,
            'q_raw_tokens': q_raw_tokens,
            'tokens': tokens,
            'has_nav': has_nav,
            'has_fac': has_fac
        }
