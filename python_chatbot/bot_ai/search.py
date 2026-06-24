import re
from sklearn.metrics.pairwise import cosine_similarity

# Konfigurasi Hybrid Search 
SEMANTIC_WEIGHT  = 0.7    # Bobot skor semantik (S-BERT)
OVERLAP_WEIGHT   = 0.3    # Bobot skor overlap keyword 
NAME_MATCH_BONUS  = 1.8   # Bonus jika nama ruangan cocok persis
NAME_PARTIAL_BONUS = 0.4  # Bonus jika nama ruangan cocok parsial (kata utuh)
NAME_CONTAINS_BONUS = 0.2 # Bonus jika nama ruangan mengandung teks (substring)
KEYWORD_FULL_BONUS = 1.5  # Bonus jika keyword cocok penuh
TOKEN_OVERLAP_BONUS = 0.25 # Bonus per token yang cocok (exact match)
FLOOR_MATCH_BONUS = 0.4   # Bonus kecocokan lantai
BLDG_MATCH_BONUS  = 0.4   # Bonus kecocokan gedung
BLDG_MISMATCH_PEN = 0.8   # Penalti ketidakcocokan gedung
NORMALIZE_DIVISOR = 3.0   # Pembagi normalisasi skor akhir

THEME = {
    "toilet":  ["toilet", "wc", "kencing", "mandi", "jamban"],
    "mushola": ["mushola", "ibadah", "shalat", "sholat", "masjid", "sembahyang"],
    "inap":    ["inap", "rawat", "bangsal"],
}
EXC = {"farmasi","apotek","admin","kantor","gudang","kasir","bidang","wadir","kepala","asesmen","klinik","poli","instalasi","keperawatan","medik","perkantoran"}

def collaborative_search(ctx, room_data, embedder, processor):
    q_raw = ctx['q_raw_lower']
    q_slang = ctx['q_slang']
    q_no_slang = ctx['q_no_slang']
    q_stop = ctx['q_stop']
    q_pref = ctx['q_pref']
    tokens = ctx['tokens']

    # Filter & Grouping
    # 1.1 Filter Toilet per Gedung
    if q_raw.startswith("filter_toilet:"):
        tgt = q_raw.split(":", 1)[1].strip()
        dk = [{'id': rid, 'nama': room_data['meta']['nama'][rid]} 
              for rid in set(room_data['ids']) if str(room_data['meta'].get('gedung', {}).get(rid, '')).lower() == tgt
              and any(re.search(fr'\b{k}', str(room_data['meta']['nama'][rid]).lower()) or 
                      re.search(fr'\b{k}', str(room_data['meta'].get('kategori', {}).get(rid, '')).lower()) 
                      for k in THEME['toilet'])]
        if not dk: return None, 0.0, False
        if len(dk) == 1: return dk[0]['id'], 0.99, False
        return [{"id": str(x['id']), "name": x['nama']} for x in dk], 0.95, True

    # 1.2 Grouping Tema (Toilet/Mushola/Inap)
    for tm, kws in THEME.items():
        if any(re.search(fr'\b{k}\b', q_slang) for k in kws) and not (tm == "inap" and any(re.search(fr'\b{ex}\b', q_slang) for ex in EXC)):
            meta = room_data['meta']
            dk = [{'id': rid, 'nama': meta['nama'][rid], 'gedung': meta.get('gedung', {}).get(rid, "Lainnya")} 
                  for rid in set(room_data['ids']) if any(re.search(fr'\b{k}', str(meta['nama'][rid]).lower()) or re.search(fr'\b{k}', str(meta.get('kategori', {}).get(rid, '')).lower()) for k in kws)]
            
            if dk:
                if len(dk) == 1: return dk[0]['id'], 0.99, False
                if tm == "toilet":
                    dg = sorted({x['gedung'] for x in dk if x['gedung']})
                    if len(dg) > 1: return [{"id": f"filter_toilet:{g}", "name": g} for g in dg], 0.96, True
                return [{"id": str(x['id']), "name": x['nama']} for x in dk], 0.95, True

    # HYBRID SCORING (AI + Keyword)
    emb_scores = cosine_similarity(embedder.encode([q_stop], show_progress_bar=False), room_data['embeddings'])[0]
    
    # Aggregate S-BERT scores: take the maximum similarity score for each room ID
    sem_scores = {}
    for i, rid in enumerate(room_data['ids']):
        sem_scores[rid] = max(sem_scores.get(rid, 0.0), float(emb_scores[i]))

    # Deteksi Gedung & Lantai
    floor_q = next((i for i, kws in enumerate([("lantai 1","lt 1","satu"),("lantai 2","lt 2","dua"),("lantai 3","lt 3","tiga")], 1) if any(k in q_slang for k in kws)), None)
    bldg_names = {processor.clean_text(g, False) for g in room_data['meta'].get('gedung', {}).values() if g}
    bldg_q = [g for g in bldg_names if g in q_slang]

    scores = {}
    for rid in room_data['room_metadata'].keys():
        m = room_data['room_metadata'][rid]
        # Base Score (Semantik + Overlap menggunakan Szymkiewicz-Simpson agar kebal kalimat panjang)
        overlap_count = len(tokens & m['words'])
        overlap_ratio = overlap_count / max(min(len(tokens), len(m['words'])), 1)
        s = SEMANTIC_WEIGHT * sem_scores.get(rid, 0.0) + OVERLAP_WEIGHT * overlap_ratio + (overlap_count * TOKEN_OVERLAP_BONUS)
        
        # Peningkatan Skor Nama Ruangan
        if q_stop in (m['nm_ns'], m['nm_db_ns']) or q_pref in (m['nm_nss'], m['nm_db_nss']): 
            s += NAME_MATCH_BONUS
        elif re.search(fr'\b{re.escape(m["nm_ns"])}\b', q_stop) or re.search(fr'\b{re.escape(q_stop)}\b', m["nm_ns"]): 
            s += NAME_PARTIAL_BONUS
        elif m['nm_ns'] in q_stop or q_stop in m['nm_ns']: 
            s += NAME_CONTAINS_BONUS
        
        # Keywords 
        kw_boost = 0.0
        for k in m['kunci_all']:
            if k in m['bldg_cl'] or m['bldg_cl'] in k: continue
            if k in (q_stop, q_slang): kw_boost = max(kw_boost, KEYWORD_FULL_BONUS)
            elif re.search(fr'\b{re.escape(k)}\b', q_slang): kw_boost += min(0.3 * len(k.split()), 0.9)
            elif k in q_slang or q_slang in k: kw_boost += 0.15
        s += min(kw_boost, 2.5)

        # Filters (Lantai, Gedung, Arah)
        if floor_q and m.get('floor'): s += FLOOR_MATCH_BONUS if floor_q == m['floor'] else -1.0
        s += sum(BLDG_MATCH_BONUS if g in m['bldg_cl'] else -BLDG_MISMATCH_PEN for g in bldg_q)
        for side in ('kiri','kanan'):
            if side in q_slang:
                opp = 'kanan' if side == 'kiri' else 'kiri'
                s += 0.5 if side in m['r_text'] else (-0.5 if opp in m['r_text'] else 0)
                
        scores[rid] = max(s, 0.0)

    best_id = max(scores, key=scores.get)
    return best_id, min(float(scores[best_id] / NORMALIZE_DIVISOR), 1.0), False