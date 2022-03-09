<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardPostController;
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
    Route::post('/comment/{post:slug}/{user}', [PostController::class, 'comment'])->name('comment')->middleware('auth');
});

// Route Authentication

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'check'])->name('login.check');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.index')->withoutMiddleware('guest')->middleware('auth');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// Dashboard
Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function() {
    Route::get('/', function() {
        return view('Dashboard.index');
    })->name('index');

    Route::resource('/posts', DashboardPostController::class)->scoped(['post' => 'slug'])->names('post');

    Route::get('/categories/jumlah', [CategoryController::class, 'jumlah'])->name('category.jumlah');
    Route::resource('/categories', CategoryController::class)->except('show')->scoped(['category' => 'slug_category'])->names('category');
});


