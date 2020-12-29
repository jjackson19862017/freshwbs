<?php

use App\Models\WedEvents;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/wedevents', [App\Http\Controllers\WedEventsController::class, 'index'])->name('wedevents.index');
    Route::post('/wedevents', [App\Http\Controllers\WedEventsController::class, 'store'])->name('wedevent.store');
    Route::delete('/wedevents/{wedevent}', [App\Http\Controllers\WedEventsController::class, 'destroy'])->name('wedevent.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/wedevents/{wedevent}/edit', [App\Http\Controllers\WedEventsController::class, 'edit'])->name('wedevents.edit');
    Route::put('/wedevents/{wedevent}/update', [App\Http\Controllers\WedEventsController::class, 'update'])->name('wedevents.update');
    Route::get('/wedevents/create', [App\Http\Controllers\WedEventsController::class, 'create'])->name('wedevent.create');
});
