<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class test extends Controller

{
    public function index()
{
    $users = Account::all();
    return view('admin.users_list', compact('users'));
}

    public function edit(Request $request, $id)
    {
        $user = Account::findOrFail($id);

        if ($request->isMethod('post')) {
            if ($request->has('toggle_admin')) {
                $user->admin = !$user->admin;
                $user->save();
                return back()->with('success', 'Administratora statuss mainīts!');
            }

            if ($request->has('delete_user')) {
                $user->delete();
                return redirect('/')->with('success', 'Lietotājs izdzēsts!');
            }
        }

        return view('admin.edit', compact('user'));
    }
}
