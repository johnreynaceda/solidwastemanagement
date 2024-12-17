<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    protected $guarded = [];

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
