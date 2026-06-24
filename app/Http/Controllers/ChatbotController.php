<?php

namespace App\Http\Controllers;

use App\Services\ChatbotService;
use App\Models\ChatbotFeedback;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

// ChatbotController — Thin controller, seluruh logika bisnis di ChatbotService.
class ChatbotController extends Controller
{
    public function __construct(
        protected ChatbotService $chatbot
    ) {}

    // Halaman utama chatbot
    public function index(): View
    {
        return view('chatbot');
    }

    // Proses pesan user → Flask AI → respons + data ruangan
    public function handleMessage(Request $request): JsonResponse
    {
        return response()->json(
            $this->chatbot->predict($request->input('message', ''))
        );
    }

    //Simpan feedback user & trigger auto-learning
    public function storeFeedback(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_message'      => 'required|string|max:1000',
            'is_correct'        => 'required|boolean',
            'is_intent_correct' => 'nullable|boolean',
            'predicted_room_id' => 'nullable|integer|exists:data_ruangans,id',
            'intent'            => 'nullable|string|max:50',
            'correct_room_name' => 'nullable|string|max:255',
        ]);

        $this->chatbot->saveFeedback($validated);

        return response()->json(['status' => 'success']);
    }

    // Sinkronisasi manual dari Admin Dashboard
    public function manualSync(): JsonResponse
    {
        return $this->chatbot->syncModels()
            ? response()->json(['status' => 'success', 'message' => 'Model AI berhasil diperbarui dan disinkronkan.'])
            : response()->json(['status' => 'error',   'message' => 'Gagal melakukan sinkronisasi model AI.'], 500);
    }

    // Hapus log feedback terpilih (bulk/single) & trigger scheduleSync
    public function destroyFeedback(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids'   => 'required|array|min:1',
            'ids.*' => 'integer|exists:chatbot_feedback,id'
        ]);

        ChatbotFeedback::whereIn('id', $validated['ids'])->delete();
        $this->chatbot->scheduleSync();

        return response()->json(['status' => 'success', 'message' => count($validated['ids']) . ' feedback berhasil dihapus.']);
    }
}
