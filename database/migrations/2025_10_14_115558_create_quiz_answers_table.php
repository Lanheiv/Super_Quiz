<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->integer("topic_id");
            $table->integer("question_id");
            $table->string("answer");
            $table->boolean("is_it_correct")->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_answers');
    }
};
