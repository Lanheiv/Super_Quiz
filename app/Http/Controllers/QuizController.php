<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        return view("index");
    }
    public function create() {
        return view("admin.create_quiz");
    }
    public function store(Request $request) {
        
    }
    public function show() {

    }
    public function edit() {

    }
    public function update()
    {

    }
    public function destroy() {

    }
}
