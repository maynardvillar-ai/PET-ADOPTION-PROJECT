<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'Pet';

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class);
    }

    public function adopters()
    {
        return $this->belongsToMany(Adopter::class, 'adoption');
    }
}