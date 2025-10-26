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
        return view('admin.users_list', compact('users'));
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

        return view("admin.edit_quiz", ["QuizTopic" => $QuizTopic]);
    }
    public function quiz_create () {
        return view("admin.create_quiz");
    }
    public function quiz_destroy($topicId) {
        QuizAnswer::where('topic_id', $topicId)->delete();
        QuizQuestion::where('topic_id', $topicId)->delete();
        QuizTopic::where('id', $topicId)->delete();

        return redirect('/admin/quiz');
    }
}
