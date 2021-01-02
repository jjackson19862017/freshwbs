<?php

use App\Models\Card;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::post('/Cards', [App\Http\Controllers\CardsController::class, 'store'])->name('card.store');
    Route::delete('/Cards/{card}', [App\Http\Controllers\CardsController::class, 'destroy'])->name('card.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/Cards/{Card}/edit/{Wed}', [App\Http\Controllers\CardsController::class, 'edit'])->name('card.edit');
    Route::put('/Cards/{Card}/update/{Wed}', [App\Http\Controllers\CardsController::class, 'update'])->name('card.update');
    Route::get('/Cards/{Card}/create/{Wed}', [App\Http\Controllers\CardsController::class, 'create'])->name('card.create');
});
