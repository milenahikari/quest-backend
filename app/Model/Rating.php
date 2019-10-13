<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['id_user', 'id_monitor', 'rating'];
}
