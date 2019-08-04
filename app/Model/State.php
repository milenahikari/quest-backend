<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function getCities(){
        return $this->hasMany(City::class);
    }
}
