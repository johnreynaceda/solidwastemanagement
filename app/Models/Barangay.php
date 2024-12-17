<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $guarded = [];

    public function puroks(){
        return $this->hasMany(Purok::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
