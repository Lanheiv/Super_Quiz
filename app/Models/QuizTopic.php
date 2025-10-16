<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTopic extends Model
{
    use HasFactory;

    protected $table = 'quiz_topic';
    public $timestamps = false;

    protected $fillable = [
        'topic_name',
        'description',
        'category_id',
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'topic_id');
    }
}
