import os, re, sys, random, threading
from datetime import datetime
from pathlib import Path
from flask import Flask, request, jsonify  

# Setup Path
HERE = Path(__file__).resolve()
ROOT = HERE.parents[2]
if str(ROOT) not in sys.path:
    sys.path.insert(0, str(ROOT))

from python_chatbot.bot_ai.engine import ChatbotEngine
from python_chatbot.bot_ai.trainer import ChatbotTrainer

# Konfigurasi Chatbot
MIN_MATCH_SCORE = 0.35   
GREETING_HOURS  = [(4, 11, "pagi"), (11, 15, "siang"), (15, 18, "sore"), (18, 24, "malam")]

class ChatbotService:
    def __init__(self):
        self.lock = threading.Lock()
        self.reload()

    def reload(self):
        with self.lock:
            try:
                self.bot, self.err = ChatbotEngine(), None
            except Exception as e:
                self.bot, self.err = None, str(e)

    def process(self, message):
        with self.lock:
            if self.err: return self._out(None, "error", 0, msg=f"System error: {self.err}")
            if not re.search(r'[a-zA-Z0-9]', message): return self._out(None, "sampah", 0, msg="Mohon masukkan kalimat yang jelas.")
            
            # 1. Pemrosesan teks tunggal (QueryContext)
            ctx = self.bot.processor.process_query(message)
            
            # 2. Delegasikan logika bisnis (klasifikasi, override, dan pencarian) ke Engine
            intent, room_id, score, is_option = self.bot.get_final_intent_and_room(ctx, MIN_MATCH_SCORE)
            
            # 3. Formatting & Return Response (Tugas murni Controller)
            if intent != 'cari_ruangan':
                return self._out(None, intent, 1.0)
            if is_option: 
                return self._out(None, intent, score, options=room_id, msg="Silakan pilih lokasi terdekat Anda:")
            if room_id and score >= MIN_MATCH_SCORE: 
                return self._out(room_id, intent, score, nm=self.bot.get_name(room_id))
                
            return self._out(None, "sampah", score)

    def _out(self, room_id, intent, score, nm="", msg="", options=None):
        resp_list = self.bot.respon.get(intent, self.bot.respon.get("sampah", ["Maaf, saya belum bisa menjawab."]))
        txt = msg or random.choice(resp_list)
        
        h = datetime.now().hour
        greeting = "malam"  # default
        for start, end, label in GREETING_HOURS:
            if start <= h < end:
                greeting = label
                break
        txt = txt.replace("[RUANGAN]", f"*{nm}*" if nm else "").replace("[WAKTU]", f"Selamat {greeting}")
        
        return {"best_room_id": room_id, "intent": intent, "match_score": round(float(score), 4), "response": txt, "options": options}

app = Flask(__name__)
svc = ChatbotService()



@app.route('/predict', methods=['POST'])
def predict():
    msg = request.json.get('message', '').strip()
    return jsonify(svc.process(msg)) if msg else (jsonify({"error": "Pesan kosong"}), 400)

training_lock = threading.Lock()

def run_sync(data):
    if not training_lock.acquire(blocking=False):
        print("[WARN] Retraining sudah berjalan, mengabaikan permintaan.")
        return
    try:
        t = ChatbotTrainer()
        rooms_ok = t.train_rooms(data.get('rooms', []), data.get('feedbacks', []))
        intent_ok = t.train_intent(data.get('intent_feedbacks', []))
        if rooms_ok and intent_ok:
            svc.reload()
            print("[OK] Retraining selesai.")
        else:
            print("[WARN] Retraining parsial — beberapa model gagal dilatih.")
    except Exception as e:
        print(f"[Error] Retraining gagal: {e}")
    finally:
        training_lock.release()

@app.route('/sync', methods=['POST'])
def sync():
    data = request.json
    threading.Thread(target=run_sync, args=(data,)).start()
    return jsonify({"success": True, "message": "Sinkronisasi berjalan di background."})

if __name__ == '__main__':
    try:
        from waitress import serve
        serve(app, host='0.0.0.0', port=5000)
    except ImportError: app.run(host='0.0.0.0', port=5000)