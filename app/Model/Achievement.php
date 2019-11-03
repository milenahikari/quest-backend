<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['id_monitor', 'id_gem'];

    public static function getGems($idMonitor)
    {
        $gems = Achievement::where('achievements.id_monitor', '=', $idMonitor)
            ->count();
        return $gems;
    }

    public static function store($dados)
    {
        Achievement::create($dados);
    }
}
