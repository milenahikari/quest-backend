<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = "cities";

    public static function search($name)
    {

        $cities = City::select('cities.id as id_city', 'cities.name', 'states.federated_unit')
            ->join('states', 'states.id', '=', 'cities.id_state')
            ->where('cities.name', 'LIKE', "{$name}%")
            ->where('cities.id', '>', 0)
            ->orderBy('cities.name')
            ->limit(10)
            ->get();

        return $cities;
    }
}
