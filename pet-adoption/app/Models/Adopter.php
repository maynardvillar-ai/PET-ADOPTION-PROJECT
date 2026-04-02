<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    protected $table = 'Adopter';
    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'adoption');
    }
}