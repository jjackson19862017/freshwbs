<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Rota extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

    public function staff()
    {
        // Creates a One to Many relationship with Rota <-> User
        return $this->belongsTo(Staff::class, 'Id');
    }



    public function getMondayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getMondayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getMondayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getMondayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getMondayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getMondayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getTuesdayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getTuesdayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getTuesdayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getTuesdayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getTuesdayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getTuesdayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getWednesdayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getWednesdayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getWednesdayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getWednesdayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getWednesdayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getWednesdayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getThursdayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getThursdayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getThursdayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getThursdayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getThursdayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getThursdayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getFridayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getFridayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getFridayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getFridayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getFridayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getFridayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getSaturdayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getSaturdayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getSaturdayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getSaturdayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getSaturdayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getSaturdayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getSundayRoleOneAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getSundayStartOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getSundayFinishOneAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }

    public function getSundayRoleTwoAttribute($item)
    {
        // Changes the Output of the database to Shortforms
        if($item == 'Reception'){
            return "REC";
        } elseif($item == 'Housekeeping'){
            return "HK";
        } elseif($item == 'Kitchen'){
            return "KIT";
        } elseif($item == 'The Mill'){
            return "MILL";
        } elseif($item == 'Holiday'){
            return "HOL";
        }
        return $item;
    }

    public function getSundayStartTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('h:i');
    }
    public function getSundayFinishTwoAttribute($time)
    {
        // Changes the time from the Database (String) to a Carbon time
        if($time == Null){
            return "";
        }
        return Carbon::parse($time)->format('H:i');
    }
}
