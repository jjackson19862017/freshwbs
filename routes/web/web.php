<?php

use App\Models\User;
use App\Models\Role;
use App\Models\Position;

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
    $position = App\Models\Position::create(['name'=>'General Manager', 'slug'=>'general-manager', 'icon'=>'<i class="fas fa-chess-king"></i>']);
    $position = App\Models\Position::create(['name'=>'Assistant Manager', 'slug'=>'assistant-manager', 'icon'=>'<i class="fas fa-chess-queen"></i>']);
    $position = App\Models\Position::create(['name'=>'Restaurant Manager', 'slug'=>'restaurant-manager', 'icon'=>'<i class="fas fa-chess-rook"></i>']);
    $position = App\Models\Position::create(['name'=>'Head Housekeeper', 'slug'=>'head-housekeeper', 'icon'=>'<i class="fas fa-chess-bishop"></i>']);
    $position = App\Models\Position::create(['name'=>'Front of House', 'slug'=>'front-of-house', 'icon'=>'<i class="fas fa-running"></i>']);
    $position = App\Models\Position::create(['name'=>'Housekeeper', 'slug'=>'housekeeper', 'icon'=>'<i class="fas fa-chess-pawn"></i>']);
    $position = App\Models\Position::create(['name'=>'Stock Taker', 'slug'=>'stock-taker', 'icon'=>'<i class="fas fa-user-edit"></i>']);
    $position = App\Models\Position::create(['name'=>'Supervisor', 'slug'=>'supervisor', 'icon'=>'<i class="fas fa-chess-knight"></i>']);
    $position = App\Models\Position::create(['name'=>'Chef', 'slug'=>'chef', 'icon'=>'<i class="fas fa-utensils"></i>']);
    $position = App\Models\Position::create(['name'=>'Pot Wash', 'slug'=>'pot-wash', 'icon'=>'<i class="fas fa-tint"></i>']);
    return view('admin.index');
});

