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
// All the front end pages
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/experience', [App\Http\Controllers\HomeController::class, 'experience'])->name('experience');
Route::get('/interests', [App\Http\Controllers\HomeController::class, 'interests'])->name('interests');
Route::get('/piprojects', [App\Http\Controllers\HomeController::class, 'piprojects'])->name('piprojects');
Route::get('/applications', [App\Http\Controllers\HomeController::class, 'applications'])->name('applications');
Route::get('/education', [App\Http\Controllers\HomeController::class, 'education'])->name('education');

//Setup the User Roles and set the first user as admin
Route::get('/setup', function(){
    $user = User::find(1);
    $admin = App\Models\Role::create(['name'=>'Admin','slug'=>'admin']);
    $user->roles()->attach($admin);
    $admin = App\Models\Role::create(['name'=>'Owner','slug'=>'owner']);
    $admin = App\Models\Role::create(['name'=>'Manager','slug'=>'manager']);
    $admin = App\Models\Role::create(['name'=>'Staff','slug'=>'staff']);
    return view('admin.index');
});

