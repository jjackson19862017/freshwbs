<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/staffs', [App\Http\Controllers\StaffController::class, 'index'])->name('staffs.index');
    Route::post('/staffs', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
    Route::delete('/staffs/{staff}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy'); //info This allows staffs to delete posts in the admin area
    Route::put('/staffs/{staff}/update', [App\Http\Controllers\StaffController::class, 'update'])->name('staffs.update');
    Route::put('/staffs/{staff}/attach', [App\Http\Controllers\StaffController::class, 'attach'])->name('staff.position.attach');
    Route::put('/staffs/{staff}/detach', [App\Http\Controllers\StaffController::class, 'detach'])->name('staff.position.detach');

    Route::get('/staffs/update/{staff}/updatePL', [App\Http\Controllers\StaffController::class, 'updatePL'])->name('staff.PL');
    Route::get('/staffs/{staff}/profile', [App\Http\Controllers\StaffController::class, 'show'])->name('staffs.profile');


    Route::get('/staffs/{staff}/holiday/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staffs.createHoliday');
    Route::post('/staffs/{staff}/holiday/store', [App\Http\Controllers\StaffController::class, 'storeHoliday'])->name('staffs.storeHoliday');
    Route::delete('/staffs/{holiday}/holiday', [App\Http\Controllers\HolidaysController::class, 'destroy'])->name('holidays.destroy'); //info This allows users to delete Holidays in the admin area

    // Hotel Dashboard
    Route::post('/staffs/profile', [App\Http\Controllers\AdminsController::class, 'staffDashboard'])->name('staffs.staffDashboard');
    Route::post('/staffs/rota', [App\Http\Controllers\AdminsController::class, 'rotaDashboard'])->name('staffs.rotaDashboard');

});
