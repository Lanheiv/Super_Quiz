<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () { return redirect('/Login'); });

Route::get('/Login', [AccountController::class, 'index']);
Route::get('/SignUp', [AccountController::class, 'create']);