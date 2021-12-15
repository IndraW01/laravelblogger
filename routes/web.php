<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/blogs');

Route::prefix('/blogs')->name('blogs.')->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/show', [PostController::class, 'show'])->name('show');
});


