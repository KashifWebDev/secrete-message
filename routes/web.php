<?php

use App\Http\Controllers\DecryptionController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/messages/create');
});


Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{messageId}', [MessageController::class, 'show'])->name('messages.show');

Route::get('decrypt-message', [DecryptionController::class, 'showForm'])->name('decrypt.message');
Route::post('decrypt-message', [DecryptionController::class, 'decrypt'])->name('decrypt.message.submit');
