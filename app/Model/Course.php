<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id_category', 'id_monitor', 'title', 'description'];

    public static function serch($idCity, $course)
    {
        $courses = Course::select(
            'monitors.id',
            'users.name as name_monitor',
            'users.course as course',
            'users.email as email',
            'cities.name as city',
            'states.federated_unit as state',
            'monitors.phone',
            'monitors.share_phone as share'
        )->distinct()
            ->join('monitors', 'monitors.id', '=', 'courses.id_monitor')
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->join('cities', 'cities.id', '=', 'users.id_city')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->where('cities.id', '=', $idCity)
            ->where('courses.title', 'like', "%{$course}%")
            ->get();
        return $courses;
    }

    public static function destroy($idCourse)
    {
        $course = Course::find($idCourse);
        $course->delete();
        return 'Curso removido';
    }

    public static function getCourse($idCourse)
    {
        $dados = Course::select(
            'categories.id',
            'categories.name',
            'categories.icon',
            'courses.title',
            'courses.description'
        )
            ->join('categories', 'courses.id_category', '=', 'categories.id')
            ->where('courses.id', $idCourse)
            ->get();
        return $dados;
    }


    public static function updateCourse($idCourse, $dados)
    {
        $data = Course::findOrFail($idCourse);
        $data->title = mb_strtoupper($dados[0], 'UTF-8');
        $data->description = $dados[1];
        $data->save();

        return response()->json($data, 200);
    }
}
