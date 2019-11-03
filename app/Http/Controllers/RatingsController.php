<?php

namespace App\Http\Controllers;

use App\Model\Rating;
use App\Model\Achievement;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function evaluation(Request $request)
    {
        try {
            Rating::create($request->all());

            $gems = Rating::getCountRating($request->id_monitor);
            $idGem = 0;

            switch (true) {
                case $gems == 1:
                    $idGem = 1;
                    break;
                case $gems == 6:
                    $idGem = 2;
                    break;
                case $gems == 11:
                    $idGem = 3;
                    break;
                case $gems == 16:
                    $idGem = 4;
                    break;
                case $gems == 21:
                    $idGem = 5;
                    break;
                case $gems == 31:
                    $idGem = 6;
                    break;
                default:
                    break;
            }

            if ($idGem >= 1) {
                $dados = [
                    'id_monitor' => $request->id_monitor,
                    'id_gem' => $idGem
                ];
                Achievement::store($dados);
            }

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
