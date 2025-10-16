<?php

namespace App\Http\Controllers;

use App\Models\Account;

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
}
