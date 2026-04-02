<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = 'Adoption';
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }
}