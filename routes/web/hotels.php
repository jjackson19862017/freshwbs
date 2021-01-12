<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/hotels/shard', [App\Http\Controllers\HotelsController::class, 'shard'])->name('admin.hotels.shard.index');
    Route::get('/hotels/shard/holidays', [App\Http\Controllers\HotelsController::class, 'shardStaffHolidays'])->name('admin.hotels.shard.holidays');



    Route::get('/hotels/themill', [App\Http\Controllers\HotelsController::class, 'themill'])->name('admin.hotels.themill.index');
    Route::get('/hotels/themill/holidays', [App\Http\Controllers\HotelsController::class, 'themillStaffHolidays'])->name('admin.hotels.themill.holidays');




});
