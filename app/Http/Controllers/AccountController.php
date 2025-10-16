<?php

namespace App\Http\Controllers;

use App\Models\Account;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        return view("user.login");
    }
    public function create() {
        return view("user.create");
    }

    public function store(Request $request) {
        
        
        Account::create([
            "username" => $request->username,
            "password" => $request->password
          ]);
        
        return redirect("/login");
    }

    public function homePage() {
        return view("user.homePage");
    }

}
