<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuizTopic;

class AdminController extends Controller
{
    public function edituser() {
        return view("admin.edit_users");
    }
    public function editquiz() {
        $QuizTopic = QuizTopic::all();

        return view("admin.edit_quiz", ["QuizTopic" => $QuizTopic]);
    }
}
