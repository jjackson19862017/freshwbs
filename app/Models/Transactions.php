<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transactions extends Model
{
    use HasFactory;

// Allows Mass assignments.
    protected $guarded = [];

    public function wedevent()
    {
        // Creates a One to Many relationship with Transactions <-> WedEvents
        return $this->belongsTo(WedEvents::class);
    }
}
