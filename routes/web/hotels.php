<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/hotels/shard', [App\Http\Controllers\HotelsController::class, 'shard'])->name('admin.hotels.shard.index');



    Route::get('/hotels/themill', [App\Http\Controllers\HotelsController::class, 'themill'])->name('admin.hotels.themill.index');




});
