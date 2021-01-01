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
        return $this->belongsTo(Customer::class);
    }

    public function getholdtilldateAttribute($date)
    {
            return Carbon::parse($date);
    }
    public function getfirstappointmentdateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getcontractissueddateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getweddingdateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getdeposittakendateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getquarterpaymentdateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getfinalweddingtalkdateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getfinalpaymentdateAttribute($date)
    {
        return Carbon::parse($date);
    }

}
