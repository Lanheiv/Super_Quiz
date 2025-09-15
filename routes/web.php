<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SessionController;

Route::get('/', function () { return redirect('/Login'); });

Route::get('/Login', [AccountController::class, 'index']);
Route::post('/Login', [AccountController::class, 'index']);


Route::get('/SignUp', [AccountController::class, 'create']);
Route::post('/SignUp', [AccountController::class, 'store']);


Route::get('/auth', [AccountController::class, 'auth'])->middleware('auth.session');