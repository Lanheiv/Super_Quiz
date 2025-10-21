<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz_topic';
        protected $fillable = [
        'topic_name',
        'description',
    ];
}
