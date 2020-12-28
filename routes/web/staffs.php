<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/staffs', [App\Http\Controllers\StaffController::class, 'index'])->name('staffs.index');
    Route::post('/staffs', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
    Route::delete('/staffs/{staff}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy'); //info This allows staffs to delete posts in the admin area
    Route::get('/staffs/{staff}/edit', [App\Http\Controllers\StaffController::class, 'edit'])->name('staffs.edit');
    Route::put('/staffs/{staff}/update', [App\Http\Controllers\StaffController::class, 'update'])->name('staffs.update');
    Route::get('/staffs/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
    Route::put('/staffs/{staff}/attach', [App\Http\Controllers\StaffController::class, 'attach'])->name('staff.position.attach');
    Route::put('/staffs/{staff}/detach', [App\Http\Controllers\StaffController::class, 'detach'])->name('staff.position.detach');
});
