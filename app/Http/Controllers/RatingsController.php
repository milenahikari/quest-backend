<?php

namespace App\Http\Controllers;

use App\Model\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function evaluation(Request $request)
    {
        try {
            Rating::create($request->all());
            return response()->json(['success' => 'Sucesso ao avaliar o monitor'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorised'], 500);
        }
    }

    public static function getRating($idMonitor)
    {
        return Rating::get($idMonitor);
    }
}
