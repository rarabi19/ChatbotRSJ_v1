<?php

namespace App\Services;

use App\Models\DataRuangan;
use App\Models\ChatbotFeedback;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

// ChatbotService — Laravel ↔ Flask AI Engine Integration. 
class ChatbotService
{
    private string $baseUrl;

    private const SYNC_DEBOUNCE   = 30;  // seconds
    private const SYNC_PENDING_TTL = 600; // seconds

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.flask.url', env('FLASK_URL', 'http://127.0.0.1:5000')), '/');
    }

    // Zero-Sync
    public function scheduleSync(): void
    {
        Cache::put('chatbot_sync_pending', true, self::SYNC_PENDING_TTL);
    }

    // Prediksi
    public function predict(string $message): array
    {
        if (Cache::pull('chatbot_sync_pending')) {
            $this->syncModels();
        }

        $ai = $this->callFlask('/predict', ['message' => $message]);

        if (($ai['match_score'] ?? 0.0) == 0.0 && !($ai['best_room_id'] ?? null)) {
            if (Cache::add('chatbot_auto_sync', true, 60)) {
                $this->syncModels();
                $ai = $this->callFlask('/predict', ['message' => $message]);
            }
        }

        $ruangan = ($id = $ai['best_room_id'] ?? null)
            ? DataRuangan::with('fotoRuangans')->find($id)
            : null;

        return [
            'message'      => $ai['response'] ?? null,
            'rooms'        => $ruangan ? [$ruangan] : [],
            'options'      => $ai['options'] ?? null,
            'intent'       => $ai['intent'] ?? null,
            'best_room_id' => $ai['best_room_id'] ?? null,
        ];
    }

    // Feedback & Pembelajaran
    public function saveFeedback(array $data): void
    {
        ChatbotFeedback::create($data);

        $needSync = false;

        if (!$data['is_correct'] && ($nama = trim($data['correct_room_name'] ?? ''))) {
            $ruangan = DataRuangan::whereRaw('LOWER(nama_ruangan) = ?', [strtolower($nama)])->first()
                    ?? DataRuangan::where('nama_ruangan', 'like', "%{$nama}%")->first();

            if ($ruangan) {
                $ruangan->update([
                    'kata_kunci' => ($ruangan->kata_kunci ? $ruangan->kata_kunci . ', ' : '') . strtolower($data['user_message'])
                ]);
                $needSync = true;
            }
        }

        if (isset($data['is_intent_correct']) && (int)$data['is_intent_correct'] === 0) {
            $needSync = true;
        }

        if ((int)($data['is_correct'] ?? 1) === 0) {
            $needSync = true;
        }

        if ($needSync) {
            $this->scheduleSync();
        }
    }

    // Sinkronisasi Model
    public function syncModels(): bool
    {
        if (!Cache::add('chatbot_sync_lock', true, self::SYNC_DEBOUNCE)) {
            $this->scheduleSync();
            return true;
        }

        $payload = [
            'rooms' => DataRuangan::all([
                'id', 'nama_ruangan', 'nama_gedung',
                'fungsi_ruangan', 'kata_kunci', 'kategori', 'navigasi'
            ])->toArray(),

            'feedbacks' => ChatbotFeedback::where('is_correct', 1)
                ->get(['user_message', 'predicted_room_id as intent'])->toArray(),

            'intent_feedbacks' => ChatbotFeedback::where('is_intent_correct', 0)
                ->whereNotNull('intent')
                ->get(['user_message', 'intent'])
                ->toArray(),
        ];

        $res = $this->callFlask('/sync', $payload, 60);

        if ($res['success'] ?? false) {
            Cache::put('last_sync_time', now()->format('d/m/Y H:i:s'), 86400);
            return true;
        }

        Cache::forget('chatbot_sync_lock');
        return false;
    }

    // HTTP Client
    private function callFlask(string $path, array $data, int $timeout = 10): array
    {
        try {
            $res = Http::timeout($timeout)->post("{$this->baseUrl}{$path}", $data);
            return $res->successful() ? $res->json() : $this->offlineResponse();
        } catch (\Exception $e) {
            Log::error("Flask {$path}: {$e->getMessage()}");
            return $this->offlineResponse();
        }
    }

    private function offlineResponse(): array
    {
        return [
            'intent'       => 'unknown',
            'response'     => 'Maaf, sistem navigasi sedang dalam pemeliharaan berkala.',
            'best_room_id' => null,
            'match_score'  => 0.0,
            'options'      => [],
        ];
    }
}
