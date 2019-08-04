<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = "cities";

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function users() {
        return $this->hasMany(User::class);  
    }
}
