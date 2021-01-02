<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

    public function wedevent(): HasOne
    {
        // Creates a One to One relationship with Customer <-> WedEvents
        return $this->hasOne(WedEvents::class);
    }
}
