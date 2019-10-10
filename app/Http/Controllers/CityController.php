<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;

class CityController extends Controller
{

    public function searchCity(Request $request)
    {

        $cities = City::search($request->get('q'));
        return $cities;
    }

    // public function search(Request $request)
    // {
    //     $cities = City::search($request->get('q'),$request->get('cod_state'));
    //     return response()->json(
    //         [
    //             "status"=>true,
    //             "cities"=> $cities
    //         ]
    //     );
    // }
}
