<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];


    public function positions(){
        // Creates a Many to Many relationship with Staff <-> Position
        return $this->belongsToMany('App\Models\Position');
    }

    public function holidays(){
        // Creates a One to Many relationship with Staff <-> Holidays
        return $this->hasMany('App\Models\Holidays');
    }

     public function dailysales(){
        // Creates a One to Many relationship with Staff <-> Holidays
        return $this->hasMany('App\Models\DailySales');
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
     // Creates a one to many relationship to Rotas
     public function rotas(): HasMany
     {
         return $this->hasMany(Rota::class);
     }
}
