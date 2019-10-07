<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id_category', 'id_monitor', 'title', 'description'];

    public static function serch($idCity, $course)
    {
        $course = Course::select(
            'monitors.id',
            'users.name as name_monitor',
            'users.course as course',
            'users.email as email',
            'cities.name as city',
            'states.federated_unit as state'
        )
            ->join('monitors', 'monitors.id', '=', 'courses.id_monitor')
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->join('cities', 'cities.id', '=', 'users.id_city')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->where('cities.id', '=', $idCity)
            ->where('courses.title', 'like', "%{$course}%")
            ->get();
        return $course;
    }
}
