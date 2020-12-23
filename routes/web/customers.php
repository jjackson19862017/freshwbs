<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::delete('/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/customers/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
});
