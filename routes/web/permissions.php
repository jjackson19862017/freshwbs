<?php
use Illuminate\Support\Facades\Route;

Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
