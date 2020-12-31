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
        return $this->belongsToMany('App\Models\Position');
    }

    public function getPersonallicenseAttribute($value)
    {
        if($value == "Yes") {
            $value = "check";
        } else {
            $value = "times";
        }
        return $value;
    }
}
