<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

use App\Models\QuizQuestion;

use App\Models\QuizAnswer;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        $Quizz = Quiz::all();

        return view("index", ['quizz' => $Quizz]);
    }
    public function create() {
        return view("admin.create_quiz");
    }
    public function store(Request $request) {
        
    }
public function show($topic_id) {
    $questions = QuizQuestion::with('answers')
        ->where('topic_id', $topic_id)
        ->get();

    if ($questions->isEmpty()) {
        abort(404, 'Jautājumi ar šo tēmu nav atrasti.');
    }

    return view("quiz.quizz", ['questions' => $questions, 'topic_id' => $topic_id]);
}



    public function edit() {

    }
    public function update()
    {

    }
    public function destroy() {

    }
}
