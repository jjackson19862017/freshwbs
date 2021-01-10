<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/stats', [App\Http\Controllers\StatsController::class, 'index'])->name('stats.index');
    Route::get('/stats/breakdown', [App\Http\Controllers\StatsController::class, 'breakdown'])->name('stats.breakdown');
    Route::get('/stats/transaction', [App\Http\Controllers\StatsController::class, 'transaction'])->name('stats.transaction');

});
