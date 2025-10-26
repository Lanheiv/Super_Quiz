<?php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

Route::get('/', function() { return redirect("/login"); })->middleware('guest');
Route::get('/', [QuizController::class, 'index'])->middleware('auth');

Route::get('/quiz/{quiz}', [QuizController::class, 'show']);

Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::get('/signup', [AccountController::class, 'create']);
Route::post('/signup', [AccountController::class, 'store']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/quiz', [AdminController::class, 'quiz_index']);
    Route::post('/admin/delete/quiz/{id}', [AdminController::class, 'quiz_destroy']);

    Route::get('/admin/create/quiz', [AdminController::class, 'quiz_create']);
    Route::post('/admin/create/quiz', [AdminController::class, 'quiz_store']);

    Route::get('/admin/users', [AdminController::class, 'user_index']);
    Route::match(['get','post'], '/admin/users/{id}', [AdminController::class, 'user_edit']);
});
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'show']); 
    Route::post('/account/logout', [AccountController::class, 'logout']);
    Route::post('/account/delete', [AccountController::class, 'destroy']); 
});

