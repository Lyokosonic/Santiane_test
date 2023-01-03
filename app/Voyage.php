<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $fillable = ['name', 'description'];

    public function steps()
    {
        return $this->hasMany(Steps::class);
    }
}
