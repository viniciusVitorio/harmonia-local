<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddMusicController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MusicController::class, 'index'])->name('home');

Route::get('/addMusic', [AddMusicController::class, 'render'])->name('addMusic')->middleware(['auth', 'verified']);
Route::post('/addMusic', [AddMusicController::class, 'store'])->name('storeMusic');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/likes/{music}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{music}', [LikeController::class, 'destroy'])->name('likes.destroy');

    Route::post('/comments/{music}', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';

