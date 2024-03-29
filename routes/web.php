<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/write-message', [MessageController::class, 'create'])->name('message.create');
    Route::post('/write-message', [MessageController::class, 'store'])->name('message.store');

    Route::get('/read-message', [MessageController::class, 'index'])->name('message.index');

    Route::get('/show-message', [MessageController::class, 'show'])->name('message.show');
    Route::post('/show-message', [MessageController::class, 'destroy'])->name('message.destroy');

    Route::get('/delete-message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::delete('/delete-message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
