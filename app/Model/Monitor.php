<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = ['id_user', 'phone', 'share_phone', 'id_course'];

}
