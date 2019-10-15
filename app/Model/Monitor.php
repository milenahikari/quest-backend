<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = ['id_user', 'phone', 'share_phone', 'id_course'];

    public static function find($idCategory)
    {
        if (!is_numeric($idCategory) || $idCategory < 0) return;

        $monitors = Course::select(
            'monitors.id',
            'users.name as name_monitor',
            'users.course as course',
            'users.email as email',
            'cities.name as city',
            'states.federated_unit as state'
        )
            ->distinct()
            ->join('categories', 'courses.id_category', '=', 'categories.id')
            ->join('monitors', 'courses.id_monitor', '=', 'monitors.id')
            ->join('users', 'monitors.id_user', '=', 'users.id')
            ->join('cities', 'users.id_city', '=', 'cities.id')
            ->join('states', 'cities.id_state', '=', 'states.id')
            ->where('categories.id', $idCategory)
            ->get();

        if (count($monitors) > 0) {
            return $monitors;
        }
    }

    public static function getPhone($idUser)
    {
        $contact = Monitor::select('monitors.phone as phone', 'monitors.share_phone as share')
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->where('users.id', '=', $idUser)
            ->get();
        return $contact;
    }
}
