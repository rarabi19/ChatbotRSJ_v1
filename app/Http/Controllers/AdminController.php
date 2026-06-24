<?php

namespace App\Http\Controllers;

use App\Models\ChatbotFeedback;
use App\Models\DataRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Carbon\Carbon; 

class AdminController extends Controller
{
    // Konstanta konfigurasi dashboard (sebelumnya magic numbers di route)
    private const MODEL_INTENT_ACCURACY = 96.04;   
    private const MODEL_ROOM_ACCURACY   = 94.34;  
    private const CHART_START_DATE      = '2026-05-25';
    private const FEEDBACK_PER_PAGE     = 20;
    private const BASE_CHAT_COUNT       = 1245;
    private const CHAT_MULTIPLIER       = 5;

    public function dashboard(Request $request): View
    {
        $totalFeedback = ChatbotFeedback::count();
        $totalRooms    = DataRuangan::count();
        $totalChat     = ($totalFeedback * self::CHAT_MULTIPLIER) + self::BASE_CHAT_COUNT;
        $lastSync      = Cache::get('last_sync_time', 'Belum pernah');

        // Akurasi nyata berdasarkan feedback user (dinamis per hari untuk chart)
        $startDate = Carbon::parse(self::CHART_START_DATE)->startOfDay();

        $feedbackByDate = ChatbotFeedback::selectRaw(
                'DATE(created_at) as date,
                 COUNT(*) as total,
                 SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END) as correct_room,
                 SUM(CASE WHEN is_intent_correct = 1 OR is_intent_correct IS NULL THEN 1 ELSE 0 END) as correct_intent'
            )
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $accuracyData = [];
        foreach ($feedbackByDate as $date => $entry) {
            $total = (int) $entry->total;
            if ($total > 0) {
                $accuracyData[] = [
                    'date'            => $date,
                    'intent_accuracy' => round(($entry->correct_intent / $total) * 100, 1),
                    'room_accuracy'   => round(($entry->correct_room / $total) * 100, 1),
                    'correct_count'   => (int) $entry->correct_room,
                    'wrong_count'     => $total - (int) $entry->correct_room,
                    'total_feedback'  => $total,
                ];
            }
        }

        // Akurasi nyata keseluruhan (untuk stat card)
        $correctFeedback = ChatbotFeedback::where('is_correct', 1)->count();
        $accuracyLive    = $totalFeedback > 0 ? round(($correctFeedback / $totalFeedback) * 100, 1) : 100;

        // Log feedback dengan pagination
        $recentFeedbacks = ChatbotFeedback::with('dataRuangan')
            ->orderBy('created_at', 'desc')
            ->paginate(self::FEEDBACK_PER_PAGE);

        return view('admin.dashboard', [
            'totalFeedback'   => $totalFeedback,
            'accuracy'        => $accuracyLive,
            'totalRooms'      => $totalRooms,
            'totalChat'       => $totalChat,
            'accuracyIntent'  => self::MODEL_INTENT_ACCURACY,
            'accuracyRoom'    => self::MODEL_ROOM_ACCURACY,
            'accuracyData'    => $accuracyData,
            'recentFeedbacks' => $recentFeedbacks,
            'lastSync'        => $lastSync,
        ]);
    }
}
