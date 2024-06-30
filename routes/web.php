<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddMusicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home.index');

Route::get('/addMusic', [AddMusicController::class, 'render'])->name('addMusic')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
