<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index'); //info The index page
    Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::delete('/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/customers/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');

    Route::get('/customers/unbooked', [App\Http\Controllers\CustomerController::class, 'unbooked'])->name('customers.unbooked'); //info Customers who havent booked
    Route::get('/customers/booked', [App\Http\Controllers\CustomerController::class, 'booked'])->name('customers.booked'); //info Customers who have booked
    Route::get('/customers/completed', [App\Http\Controllers\CustomerController::class, 'completed'])->name('customers.completed'); //info Customers who have had their wedding

});
