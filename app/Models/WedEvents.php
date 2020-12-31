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


}
