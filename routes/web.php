<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/blogs');

// Route Blogs
Route::prefix('/blogs')->name('blogs.')->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/show/{post:slug}', [PostController::class, 'show'])->name('show');
});

// Route Authentication

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'check'])->name('login.check');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.index')->withoutMiddleware('guest')->middleware('auth');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


