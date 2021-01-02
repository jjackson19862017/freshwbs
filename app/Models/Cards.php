<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Cards extends Model
{
    use HasFactory;

// Allows Mass assignments.
    protected $guarded = [];

    public function customer(): BelongsTo
    {
        // Creates a One to One relationship with Customer <-> Wed Event
        return $this->belongsTo(Customer::class);
    }

    public function setExpAttribute($value)
    {
        $this->attributes['exp'] = Carbon::parse($value);
    }

    public function getExpAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        return Carbon::parse($date)->format('m/Y');
    }

    public function getNumberAttribute($value)
    {
        $first = Str::substr($value, 0, 4);
        $second = Str::substr($value, 4, 4);
        $third = Str::substr($value, 8, 4);
        $fourth = Str::substr($value, 12, 4);
        $complete = $first . '-' . $second . '-' . $third . '-' . $fourth;
        return $complete;
    }

}
