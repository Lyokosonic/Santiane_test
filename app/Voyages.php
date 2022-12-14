<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyages extends Model
{
    protected $fillable = [
        'type',
        'number',
        'departure',
        'arrival',
        'seat',
        'gate',
        'baggage_drop',
        'departure_date',
        'arrival_date',
    ];

    public $timestamps = false;
}
