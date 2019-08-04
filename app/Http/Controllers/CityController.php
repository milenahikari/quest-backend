<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;

class CityController extends Controller
{

    public function searchCity($name) {
        if($name !== '') {
            $cities = City::select('cities.id as id_city', 'cities.name', 'states.federated_unit')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->where('cities.name', 'LIKE', '%'.$name.'%')
            ->get();

            if(count($cities) > 0) {
                return $cities;
            }
        }
    }
}
