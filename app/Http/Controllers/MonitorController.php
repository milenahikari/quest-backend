<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Monitor;
use App\Model\Course;
use Validator;
use App\Http\Controllers\RatingsController;

class MonitorController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    /** 
     * Registrar dados do monitor 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function registerMonitor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'phone' => 'required',
            'share_phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $dataMonitor = $request->all();

        //Salva dados no banco
        $monitor = Monitor::create($dataMonitor);

        $user = User::getUser($dataMonitor['id_user']);

        //Retorno id monitor
        $success['profile'] = [
            'id' => $user[0]->id,
            'name' => $user[0]->name,
            'course' => $user[0]->course,
            'email' => $user[0]->email,
            'id_city' => $user[0]->id_city,
            'teach' => $user[0]->teach,
            'phone' => $monitor->phone,
            'share' => $monitor->share_phone,
            'id_monitor' => $monitor->id
        ];

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function getMonitors()
    {
        $monitors = Monitor::select(
            'monitors.id',
            'users.name as name',
            'users.course',
            'cities.name as city',
            'states.federated_unit as state'
        )
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->join('cities', 'cities.id', '=', 'users.id_city')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->get();

        if (count($monitors) > 0) {
            return $monitors;
        }
    }

    public function monitorDetail($idMonitor)
    {
        $monitor = Monitor::select(
            'monitors.id',
            'users.name as name',
            'users.course',
            'users.email',
            'users.photo',
            'cities.name as city',
            'states.federated_unit as state'
        )
            ->join('users', 'users.id', '=', 'monitors.id_user')
            ->join('cities', 'cities.id', '=', 'users.id_city')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->where('monitors.id', intval($idMonitor))
            ->get();

        if (count($monitor) > 0) {
            return response()->json(['monitor' => $monitor]);
        }
    }

    public function getMonitorsByCategory($idCategory)
    {
        $monitors = Monitor::find($idCategory);

        if (empty($monitors)) return 0;

        foreach ($monitors as $key => $value) {
            $rating = RatingsController::getRating($value->id);
            $value->rating = $rating;
        }

        return $monitors;
    }

    public static function dataMonitor($idUser)
    {
        return Monitor::getMonitor($idUser);
    }

    // public static function getIdMonitor($idUser)
    // {
    //     return Monitor::getId($idUser);
    // }
}
