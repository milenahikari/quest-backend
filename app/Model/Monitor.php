<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Achievement;
use App\Model\Rating;

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
            'users.photo as photo',
            'cities.name as city',
            'states.federated_unit as state',
            'monitors.phone',
            'monitors.share_phone as share'
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

    public static function getMonitor($idUser)
    {
        $data = Monitor::select('monitors.phone as phone', 'monitors.share_phone as share', 'monitors.id as id_monitor')
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->where('users.id', '=', $idUser)
            ->get();
        return $data;
    }

    public static function newMonitor($monitor)
    {

        User::updateTeach($monitor->id_user);

        $data = $monitor->all();
        $retorno = Monitor::create($data);

        $user = User::getUserEdit($monitor->id_user);

        $success = [
            'id' => $user[0]->id,
            'name' => $user[0]->name,
            'course' => $user[0]->course,
            'email' => $user[0]->email,
            'photo' => $user[0]->photo,
            'id_city' => $user[0]->id_city,
            'teach' => $user[0]->teach,
            'phone' => $retorno->phone,
            'share' => $retorno->share_phone,
            'id_monitor' => $retorno->id
        ];

        return response()->json([$success], 200);
    }

    public static function getMonitorsGems()
    {
        $monitors = DB::table('achievements')
            ->join('monitors', 'achievements.id_monitor', '=', 'monitors.id')
            ->join('users', 'monitors.id_user', '=', 'users.id')
            ->join('cities', 'users.id_city', '=', 'cities.id')
            ->join('states', 'cities.id_state', '=', 'states.id')
            ->groupBy('achievements.id_monitor')
            ->orderBy(DB::raw('MAX(achievements.id_gem)'), 'desc')
            ->get([
                'achievements.id_monitor',
                'monitors.id',
                'users.name as name_monitor',
                'users.course as course',
                'users.email as email',
                'users.photo as photo',
                'cities.name as city',
                'states.federated_unit as state',
                'monitors.phone',
                'users.photo', DB::raw('MAX(achievements.id_gem) as total_gems')
            ]);

        foreach ($monitors as $key => $value) {
            $rating = Rating::get($value->id);
            $value->rating = $rating;
        }

        return $monitors;
    }
}
