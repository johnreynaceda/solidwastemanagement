<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $guarded = [];

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
