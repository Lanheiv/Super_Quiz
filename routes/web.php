<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\SessionController;

Route::get('/', function () { return redirect('/login'); });

Route::get('/login', [AccountController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);

Route::get('/signup', [AccountController::class, 'create']);
Route::post('/signup', [AccountController::class, 'store']);

Route::get('/homePage', [AccountController::class, 'homePage']);

Route::get('/auth', [AccountController::class, 'auth'])->middleware('auth.session');