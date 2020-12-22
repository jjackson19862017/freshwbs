<?php
use Illuminate\Support\Facades\Route;

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');

Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
