<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () { return redirect('/Login'); });


Route::post('/Login', [AccountController::class, 'index']);
Route::get('/Login', [AccountController::class, 'index']);

Route::post('/SignUp', [AccountController::class, 'create']);
Route::get('/SignUp', [AccountController::class, 'create']);