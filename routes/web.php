<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/experience', [App\Http\Controllers\HomeController::class, 'experience'])->name('experience');
Route::get('/interests', [App\Http\Controllers\HomeController::class, 'interests'])->name('interests');
Route::get('/piprojects', [App\Http\Controllers\HomeController::class, 'piprojects'])->name('piprojects');
Route::get('/applications', [App\Http\Controllers\HomeController::class, 'applications'])->name('applications');
Route::get('/education', [App\Http\Controllers\HomeController::class, 'education'])->name('education');

Route::middleware('auth')->group(function() {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy'); //info This allows users to delete users in the admin area

});
