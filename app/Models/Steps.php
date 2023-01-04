<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    protected $fillable = [
        'type',
        'transport_number',
        'departure_date',
        'arrival_date',
        'departure',
        'arrival',
        'seat',
        'gate',
        'baggage_drop',
        'voyage_id',
    ];

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}
