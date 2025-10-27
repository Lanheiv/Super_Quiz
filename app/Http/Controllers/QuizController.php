<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\QuizResult;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index() {
        $Quizz = Quiz::all();

        return view("index", ['quizz' => $Quizz]);
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
    public function start(Request $request) {
        $topicId = $request->input('topic');
        return redirect("/quiz/$topicId/start");
    }
    public function play(Request $request, $topicId)
    {
        $questions = QuizQuestion::where('topic_id', $topicId)->get();

        if (!Session::has("quiz.$topicId")) {
            Session::put("quiz.$topicId", [
                'current' => 0,
                'score' => 0,
                'start_time' => now(),
                'questions' => $questions->pluck('id')->shuffle()->toArray()
            ]);
        }

        $quizData = Session::get("quiz.$topicId");
        $currentIndex = $quizData['current'];
        $questionId = $quizData['questions'][$currentIndex];

        $question = QuizQuestion::find($questionId);
        $answers = QuizAnswer::where('question_id', $questionId)->inRandomOrder()->get();

        $progress = round(($currentIndex / count($quizData['questions'])) * 100);

        return view('quiz.play', compact('topicId', 'question', 'answers', 'progress'));
    }

    public function answer(Request $request, $topicId)
    {
        $quizData = Session::get("quiz.$topicId");
        $currentIndex = $quizData['current'];
        $questionId = $quizData['questions'][$currentIndex];

        $selected = $request->input('answer');
        $correct = QuizAnswer::where('question_id', $questionId)->where('is_it_correct', 1)->first();

        if ($correct && $selected == $correct->id) {
            $quizData['score']++;
        }

        $quizData['current']++;

        if ($quizData['current'] >= count($quizData['questions'])) {
            $endTime = now();
            $startTime = $quizData['start_time'];
            $secondsTaken = $startTime->diffInSeconds($endTime);

            QuizResult::create([
                'user_id' => Auth::id(),
                'topic_id' => $topicId,
                'result' => $quizData['score'],
                'question_numbers' => $quizData['current'],
                'complet_time' => $secondsTaken,
            ]);

            $minutes = floor($secondsTaken / 60);
            $seconds = $secondsTaken % 60;


            Session::forget("quiz.$topicId");

            return view('quiz.result', [
                'score' => $quizData['score'],
                'total' => count($quizData['questions']),
                'min' => $minutes,
                'sec' => $seconds,
                'topicId' => $topicId,
            ]);
        }

        Session::put("quiz.$topicId", $quizData);
        return redirect("/quiz/$topicId/start");
    }
}
