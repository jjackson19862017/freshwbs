<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/wedevents', [App\Http\Controllers\WedEventsController::class, 'index'])->name('wedevents.index');
    Route::get('/wedevents/completed', [App\Http\Controllers\WedEventsController::class, 'completed'])->name('wedevents.completed');
    Route::post('/wedevents', [App\Http\Controllers\WedEventsController::class, 'store'])->name('wedevent.store');
    Route::delete('/wedevents/{wedevent}', [App\Http\Controllers\WedEventsController::class, 'destroy'])->name('wedevent.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/wedevents/{wedevent}/edit', [App\Http\Controllers\WedEventsController::class, 'edit'])->name('wedevents.edit');
    Route::put('/wedevents/{wedevent}/update', [App\Http\Controllers\WedEventsController::class, 'update'])->name('wedevents.update');
    Route::get('/wedevents/create/{customer}', [App\Http\Controllers\WedEventsController::class, 'create'])->name('wedevent.create');
    Route::get('/wedevents/{wedevent}/profile', [App\Http\Controllers\WedEventsController::class, 'show'])->name('wedevent.profile.show');

    Route::get('/wedevents/update/{wedevent}/OnHold', [App\Http\Controllers\WedEventsController::class, 'updateOnHold'])->name('wedevent.OnHold');
    Route::get('/wedevents/update/{wedevent}/ContractReturned', [App\Http\Controllers\WedEventsController::class, 'updateContractReturned'])->name('wedevent.ContractReturned');
    Route::get('/wedevents/update/{wedevent}/AgreementSigned', [App\Http\Controllers\WedEventsController::class, 'updateAgreementSigned'])->name('wedevent.AgreementSigned');
    Route::get('/wedevents/update/{wedevent}/DepositTaken', [App\Http\Controllers\WedEventsController::class, 'updateDepositTaken'])->name('wedevent.DepositTaken');
    Route::get('/wedevents/update/{wedevent}/QuarterPaymentTaken', [App\Http\Controllers\WedEventsController::class, 'updateQuarterPaymentTaken'])->name('wedevent.QuarterPaymentTaken');
    Route::get('/wedevents/update/{wedevent}/HadFinalTalk', [App\Http\Controllers\WedEventsController::class, 'updateHadFinalTalk'])->name('wedevent.HadFinalTalk');
    Route::get('/wedevents/update/{wedevent}/Complete', [App\Http\Controllers\WedEventsController::class, 'updateComplete'])->name('wedevent.Complete');

});
