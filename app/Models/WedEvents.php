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


    protected $dates = [
        'holdtilldate',
        'firstappointmentdate',
        'contractissueddate',
        'weddingdate',
        'deposittakendate',
        'quarterpaymentdate',
        'finalweddingtalkdate',
        'finalpaymentdate',
    ];

    // Changing the Output of the Dates in the Wed Event
    public function getFirstappointmentdateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getHoldtilldateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getContractissueddateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getWeddingdateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getDeposittakendateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getQuarterpaymentdateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getFinalweddingtalkdateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }

    public function getFinalpaymentdateAttribute($value)
    {
        return Carbon::parse($value)->format('D d-M-y');
    }


    // Relationship Setup
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }


}
