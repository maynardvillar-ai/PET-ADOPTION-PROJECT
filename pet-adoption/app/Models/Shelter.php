<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $table = 'Shelter';
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}