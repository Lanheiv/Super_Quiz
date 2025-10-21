<?php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;

Route::get('/', function() { return redirect("/login"); })->middleware('guest');
Route::get('/', [QuizController::class, 'index'])->middleware('auth');

Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::get('/signup', [AccountController::class, 'create']);
Route::post('/signup', [AccountController::class, 'store']);

Route::get('/admin/users', [test::class, 'index']); 
Route::get('/admin/user/{id}', [test::class, 'edit']); 
Route::post('/admin/user/{id}', [test::class, 'update']);
