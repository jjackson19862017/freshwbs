<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];



    public function positions(){
        // Creates a Many to Many relationship with Staff <-> Position
        return $this->belongsToMany('App\Models\Position');
    }

    public function getPersonallicenseAttribute($value)
    {
        // Changes the output from the database, to icons for the staff index page.
        if($value == "Yes") {
            $value = "check";
        } else {
            $value = "times";
        }
        return $value;
    }
}
