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
    Route::get('/admin/quiz', [AdminController::class, 'editquiz_index']);

    Route::get('/admin/users', [AdminController::class, 'edituser_index']);
    Route::match(['get','post'], '/admin/users/{id}', [AdminController::class, 'edituser_edit']);
});
