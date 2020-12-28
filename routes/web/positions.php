<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::get('/positions', [App\Http\Controllers\PositionController::class, 'index'])->name('position.index');
    Route::post('/positions', [App\Http\Controllers\PositionController::class, 'store'])->name('position.store');
    Route::delete('/positions/{position}', [App\Http\Controllers\PositionController::class, 'destroy'])->name('position.destroy');

    Route::get('/positions/{position}/edit', [App\Http\Controllers\PositionController::class, 'edit'])->name('positions.edit');
    Route::put('/positions/{position}/update', [App\Http\Controllers\PositionController::class, 'update'])->name('positions.update');

    Route::put('/positions/{position}/attach', [App\Http\Controllers\PositionController::class, 'staff_attach'])->name('position.staff.attach');
    Route::put('/positions/{position}/detach', [App\Http\Controllers\PositionController::class, 'staff_detach'])->name('position.staff.detach');
});
