<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $table = 'quiz_results';

    protected $fillable = [
        'user_id',
        'topic_id',
        'result',
        'question_numbers',
        'complet_time',
    ];

    public function topic()
    {
        return $this->belongsTo(QuizTopic::class, 'topic_id');
    }
}
