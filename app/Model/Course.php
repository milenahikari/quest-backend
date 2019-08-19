<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id_category', 'id_monitor','title', 'description'];
}
