<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\QuizResult;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;



class AccountController extends Controller
{
    public function create() {
        return view("user.create");
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "username" => ["required", "string"],
            "password" => ["required", Password::min(6)->numbers()->letters()]
        ]);
        
        Account::create([
            "username" => $validated["username"],
            "password" => Hash::make($validated["password"])
        ]);
        
        return redirect("/login");
    }
    public function show() {
        $user = Auth::user();
        $test_results = QuizResult::where('user_id', Auth::id())->get();

        return view('account.show', compact('user', 'test_results'));
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function destroy(Request $request) {
        QuizResult::where('user_id', Auth::id())->delete();

        $user = Auth::user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/signup');
    }
}
