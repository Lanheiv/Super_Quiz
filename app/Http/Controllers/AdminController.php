<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class AdminController extends Controller
{
    public function user_index() {
        $users = Account::all();
        return view('admin.list_users', compact('users'));
    }
    public function user_edit(Request $request, $id) {
        $user = Account::findOrFail($id);

        if ($request->isMethod('post')) {
            if ($request->has('toggle_admin')) {
                $user->admin = !$user->admin;
                $user->save();
                return back()->with('success', 'Administratora statuss mainīts!');
            }

            if ($request->has('delete_user')) {
                $user->delete();
                return redirect('/admin/users');
            }
        }
    }

    public function quiz_index() {
        $QuizTopic = QuizTopic::all();

        return view("admin.list_quiz", ["QuizTopic" => $QuizTopic]);
    }
    public function quiz_create () {
        return view("admin.create_quiz");
    }
    public function quiz_store (Request $new_quiz_data) {
        $validated = $new_quiz_data->validate([
            'topic_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        QuizTopic::create([
            "topic_name" => $validated["topic_name"],
            "description" => $validated["description"],
        ]);

        return redirect ('/admin/quiz');

    }
    public function quiz_destroy($topicId) {
        QuizAnswer::where('topic_id', $topicId)->delete();
        QuizQuestion::where('topic_id', $topicId)->delete();
        QuizTopic::where('id', $topicId)->delete();

        return redirect('/admin/quiz');
    }

    public function question_index ($quizId) {
        $questions = QuizQuestion::where('topic_id', $quizId)->get();
        $answers = QuizAnswer::where('topic_id', $quizId)->get();

        return view('admin.list_questions', compact('questions', 'answers', 'quizId'));
    }
    public function question_create($id) {
        return view('admin.create_question', compact('id'));
    }
    public function question_store(Request $request, $id) {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array|min:4|max:4',
            'answers.*' => 'required|string|max:255',
            'correct_answer' => 'required|integer|min:0|max:3',
        ]);

        $question = QuizQuestion::create([
            'topic_id' => $id,
            'question' => $validated['question'],
        ]);

        foreach ($validated['answers'] as $index => $answerText) {
            QuizAnswer::create([
                'topic_id' => $id,
                'question_id' => $question->id,
                'answer' => $answerText,
                'is_it_correct' => ($index == $validated['correct_answer']),
            ]);
        }

        return redirect("/admin/questions/$id");
    }
    public function question_edit($id) {
        $question = QuizQuestion::findOrFail($id);
        $answers = QuizAnswer::where('question_id', $id)->get();

        return view("admin.edit_questions", compact('question', 'answers'));
    }
    public function question_update(Request $request, $id) {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array|min:4|max:4',
            'answers.*' => 'required|string|max:255',
            'correct_answer' => 'required|integer|min:0|max:3',
        ]);

        $question = QuizQuestion::findOrFail($id);
        $question->question = $validated['question'];
        $question->save();

        $answers = QuizAnswer::where('question_id', $id)->orderBy('id')->get();

        foreach ($validated['answers'] as $index => $answerText) {
            if (isset($answers[$index])) {
                $answers[$index]->answer = $answerText;
                $answers[$index]->is_it_correct = ($index == $validated['correct_answer']);
                $answers[$index]->save();
            } else {
                QuizAnswer::create([
                    'topic_id' => $question->topic_id,
                    'question_id' => $id,
                    'answer' => $answerText,
                    'is_it_correct' => ($index == $validated['correct_answer']),
                ]);
            }
        }

        return redirect("/admin/questions/{$question->topic_id}");
    }
    public function question_destroy($quizId, $questionId) {
        QuizAnswer::where('question_id', $questionId)->delete();
        QuizQuestion::where('id', $questionId)->delete();

        return redirect("/admin/questions/$quizId");
    }
}
