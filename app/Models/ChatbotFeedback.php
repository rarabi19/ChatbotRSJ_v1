<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotFeedback extends Model
{
    use HasFactory;

    protected $table = 'chatbot_feedback';

    protected $fillable = [
        'user_message',
        'predicted_room_id',
        'intent',
        'is_correct',
        'correct_room_name',
        'is_intent_correct',
    ];

    public function dataRuangan()
    {
        return $this->belongsTo(DataRuangan::class, 'predicted_room_id');
    }
}
