import json, joblib
from pathlib import Path
from sklearn.preprocessing import normalize
from python_chatbot.bot_ai.processor import TextProcessor, get_embedder
from python_chatbot.bot_ai.search import collaborative_search

ROOT = Path(__file__).resolve().parents[1] / 'model_resource'

class ChatbotEngine:
    def __init__(self):
        self.emb = get_embedder()
        self.intent = joblib.load(ROOT / 'modelLabel.pkl')
        self.room = joblib.load(ROOT / 'modelDataRuangan.pkl')
        self.processor = TextProcessor()
        with open(ROOT / 'respons-default.json', 'r', encoding='utf-8') as f:
            self.respon = {k: v for intent_item in json.load(f).get('intents', []) for k, v in intent_item.items()}

    def predict_intent(self, ctx):
        clean_message = ctx['q_slang']
        message_vector = normalize(self.emb.encode([clean_message], show_progress_bar=False))
        intent = self.intent['classifier'].predict(message_vector)[0]
        return str(intent)

    def search_room(self, ctx):
        clean_message = ctx['q_slang']
        if clean_message.isdigit() and int(clean_message) in self.room['meta']['nama']:
            return int(clean_message), 1.0, False
        return collaborative_search(ctx, self.room, self.emb, self.processor)

    def get_final_intent_and_room(self, ctx, min_score=0.35):
        """Menentukan intent akhir dan mengembalikan hasil pencarian ruangan secara bersamaan."""
        clean_msg = ctx['q_slang']
        room_id, score, is_option = self.search_room(ctx)
        
        # 1. Base Intent
        if clean_msg.isdigit() or ctx['q_raw_lower'].startswith("filter_toilet:"):
            intent = 'cari_ruangan'
        else:
            intent = self.predict_intent(ctx)
            
        # 2. Intent Override (Koreksi otomatis jika SVM meleset tapi relevan dengan RS)
        if intent != 'cari_ruangan':
            if ctx['has_fac'] and (score >= min_score or ctx['has_nav']):
                intent = 'cari_ruangan'
            elif ctx['has_nav'] and score >= min_score:
                intent = 'cari_ruangan'
            elif score >= 0.45:
                intent = 'cari_ruangan'
                
        return intent, room_id, score, is_option

    def get_name(self, room_id):
        return str(self.room.get('meta', {}).get('nama', {}).get(int(room_id), ""))
