<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Holidays extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

public function staff()
    {
        // Creates a One to Many relationship with Holidays <-> Staff
        return $this->belongsTo(Staff::class);
    }

 public function getstartAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
            return Carbon::parse($date)->format('D d M y');
    }
    public function getfinishAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date)->format('D d M y');
    }

}
