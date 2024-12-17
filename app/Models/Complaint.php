<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $guarded = [];

    public function purok(){
        return $this->belongsTo(Purok::class);
    }

    public function waste(){
        return $this->belongsTo(Waste::class);
    }

    public function violation(){
        return $this->belongsTo(Violation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
