import joblib, json
from pathlib import Path
import pandas as pd
from sklearn.preprocessing import normalize
from python_chatbot.bot_ai.processor import TextProcessor, get_embedder

ROOT = Path(__file__).resolve().parents[1] / 'model_resource'

class ChatbotTrainer:
    def __init__(self):
        self.processor = TextProcessor()
        self.slang = self.processor.slang
        self.embedder = get_embedder()

    def train_intent(self, intent_feedbacks=None):
        try:
            filepath_excel = ROOT / 'Label Pertanyaan.xlsx'
            if not filepath_excel.exists():
                return False
            df_intent = pd.read_excel(filepath_excel).drop_duplicates().dropna()
            questions_list = df_intent['Pertanyaan'].tolist()
            labels_list = df_intent['Label'].tolist()
            
            if intent_feedbacks:
                for feedback in intent_feedbacks:
                    if feedback.get('user_message') and feedback.get('intent'):
                        questions_list.append(feedback['user_message'])
                        labels_list.append(feedback['intent'])
                        
            questions_embeddings = normalize(self.embedder.encode([self.processor.clean_text(q) for q in questions_list], show_progress_bar=False))
            from sklearn.svm import LinearSVC
            classifier_svm = LinearSVC(class_weight='balanced', dual=False, fit_intercept=False, random_state=42).fit(questions_embeddings, labels_list)
            
            data = {
                'classifier': classifier_svm,
                'labels_intent': classifier_svm.classes_.tolist(),
                'embedder_name': 'paraphrase-multilingual-MiniLM-L12-v2',
                'slang_dict': self.slang,
                'metode': 'linear_svm_sbert'
            }
            joblib.dump(data, ROOT / 'modelLabel.pkl')
            return True
        except Exception as e:
            print(f"Error training intent: {e}")
            return False

    def train_rooms(self, rooms, feedbacks=None):
        try:
            train_text_list, train_ids_list = [], []
            meta_name, meta_building, meta_category, meta_keywords_all, room_metadata_db = {}, {}, {}, {}, {}
            
            for room in rooms:
                room_id = int(room['id'])
                room_name = room.get('nama_ruangan', '') or ''
                building_name = room.get('nama_gedung', '') or ''
                category = room.get('kategori', '') or ''
                function = room.get('fungsi_ruangan', '') or ''
                keywords = room.get('kata_kunci', '') or ''
                navigation = room.get('navigasi', '') or ''
                
                meta_name[room_id] = room_name
                meta_building[room_id] = building_name
                meta_category[room_id] = category
                meta_keywords_all[room_id] = f"{room_name} {function} {category} {keywords}"
                
                clean_name_std = self.processor.clean_text(room_name, False)
                clean_name_slang = self.processor.clean_text(room_name, True)
                clean_key_std = self.processor.clean_text(keywords.replace(';', ' '), False)
                clean_key_slang = self.processor.clean_text(keywords.replace(';', ' '), True)
                
                for text in [clean_name_std, clean_name_slang, self.processor.clean_text(f"{room_name} {building_name} {category}", False)]:
                    train_text_list.append(text)
                    train_ids_list.append(room_id)
                    
                for keyword in keywords.replace(';', ',').split(','):
                    clean_keyword = self.processor.clean_text(keyword.strip(), False)
                    if len(clean_keyword) > 2:
                        train_text_list.append(clean_keyword)
                        train_ids_list.append(room_id)
                        
                keyword_list = [k.strip() for k in keywords.replace(';', ',').split(',') if len(k.strip()) > 1]
                name_no_stopword_slang = self.processor.remove_stopwords(clean_name_slang) or clean_name_slang
                name_no_stopword_std = self.processor.remove_stopwords(clean_name_std) or clean_name_std
                
                floor = next((i for i, kws in enumerate([("lantai 1", "lt 1", "lantai satu"), ("lantai 2", "lt 2", "lantai dua"), ("lantai 3", "lt 3", "lantai tiga")], 1) if any(k in f"{room_name} {navigation} {keywords}".lower() for k in kws)), None)
                
                room_metadata_db[room_id] = {
                    'nama': room_name, 
                    'gedung': building_name, 
                    'kategori': category, 
                    'fungsi': function, 
                    'kunci': keywords, 
                    'navigasi': navigation,
                    'nm_ns': name_no_stopword_slang, 
                    'nm_nss': self.processor.strip_prefix(name_no_stopword_slang),
                    'nm_db_ns': name_no_stopword_std, 
                    'nm_db_nss': self.processor.strip_prefix(name_no_stopword_std),
                    'bldg_cl': self.processor.clean_text(building_name, False), 
                    'floor': floor,
                    'words': self.processor.get_tokens(f"{room_name} {keywords.replace(';', ' ')}"),
                    'kunci_all': [self.processor.clean_text(k.strip(), False) for k in keyword_list] + [self.processor.clean_text(k.strip(), True) for k in keyword_list],
                    'r_text': f"{room_name} {navigation} {keywords}".lower()
                }
                
            if feedbacks:
                for feedback in feedbacks:
                    user_message = feedback.get('user_message')
                    target_room_id = feedback.get('intent')
                    if user_message and target_room_id and str(target_room_id).isdigit() and int(target_room_id) in meta_name:
                        train_text_list.append(self.processor.clean_text(user_message, True))
                        train_ids_list.append(int(target_room_id))
                        
            if not train_text_list:
                return False
                
            joblib.dump({
                'embeddings': self.embedder.encode(train_text_list, show_progress_bar=False), 
                'ids': train_ids_list,
                'meta': {'nama': meta_name, 'gedung': meta_building, 'kategori': meta_category, 'kunci': meta_keywords_all},
                'room_metadata': room_metadata_db
            }, ROOT / 'modelDataRuangan.pkl')
            return True
        except Exception as e:
            print(f"Error training room: {e}")
            return False
