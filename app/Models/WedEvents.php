<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WedEvents extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

    // Relationship Setup
    public function customer(): BelongsTo
    {
        // Creates a One to One relationship with Customer <-> Wed Event

        return $this->belongsTo(Customer::class);
    }

    public function getholdtilldateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
            return Carbon::parse($date);
    }
    public function getfirstappointmentdateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getcontractissueddateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getweddingdateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getdeposittakendateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getquarterpaymentdateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getfinalweddingtalkdateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }
    public function getfinalpaymentdateAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date);
    }

}
