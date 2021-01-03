<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::post('/transactions', [App\Http\Controllers\TransactionsController::class, 'store'])->name('transaction.store');
    Route::delete('/transactions/{transaction}', [App\Http\Controllers\TransactionsController::class, 'destroy'])->name('transaction.destroy'); //info This should allow users to delete individual transactions.
    Route::get('/transactions/create/{wedevent}', [App\Http\Controllers\TransactionsController::class, 'create'])->name('transaction.create');
});
