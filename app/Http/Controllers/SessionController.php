<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
   
    public function index()
    {
        return view("index");
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
            "username" => ["required", "name"],
            "password" => ["required", "confirmed", Password::min(6)->numbers()->letters()->symbols()]
        ]);



         Auth::attempt($validated);
          if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                "password" => "Nepareiza  parole"
            ]);
        }
          $request->session()->regenerate();
           return redirect("/");
    }

    public function destroy(string $id)
    {
       Auth::logout();
        return redirect("/");
    }
}
