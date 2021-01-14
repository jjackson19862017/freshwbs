<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/hotels/shard', [App\Http\Controllers\HotelsController::class, 'shard'])->name('admin.hotels.shard.index');
    Route::get('/hotels/shard/holidays', [App\Http\Controllers\HotelsController::class, 'shardStaffHolidays'])->name('admin.hotels.shard.holidays');



    Route::get('/hotels/themill', [App\Http\Controllers\HotelsController::class, 'themill'])->name('admin.hotels.themill.index');
    Route::get('/hotels/themill/holidays', [App\Http\Controllers\HotelsController::class, 'themillStaffHolidays'])->name('admin.hotels.themill.holidays');


    // Both Hotels
    Route::get('/hotels/holidays', [App\Http\Controllers\HolidaysController::class, 'holidays'])->name('admin.hotels.holidays');
    Route::get('/hotels/endofdaysales', [App\Http\Controllers\DailySalesController::class, 'endofdaysales'])->name('admin.hotels.createDailySales');
    Route::post('/hotels/endofdaysales/store', [App\Http\Controllers\DailySalesController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/salessheet', [App\Http\Controllers\DailySalesController::class, 'salessheet'])->name('admin.hotels.salessheet');


});
