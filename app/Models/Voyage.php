<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $fillable = ['name', 'description'];

    public function steps()
    {
        return $this->hasMany(Steps::class);
    }
}
