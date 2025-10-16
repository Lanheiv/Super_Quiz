<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login() {
        return view("user.login");
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "username" => ["required", "string"],
            "password" => ["required"]
        ]);

        Auth::attempt($validated); 

        $request->session()->regenerate();
        return redirect("/");
    }
    public function destroy(){
        Auth::logout();

        return redirect("/");
    }
}
