<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Achievement;

class AchievementController extends Controller
{
    public static function getGemsMonitor($idMonitor)
    {
        $gems['number'] = Achievement::getGems($idMonitor);
        return $gems;
    }
}
