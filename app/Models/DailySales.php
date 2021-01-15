<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySales extends Model
{
    use HasFactory;
     // Allows Mass assignments.
    protected $guarded = [];

    public function staff()
    {
        // Creates a One to Many relationship with Holidays <-> Staff
        return $this->belongsTo(Staff::class);
    }

}
