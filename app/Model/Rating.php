<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['id_user', 'id_monitor', 'rating'];

    public static function getSumRating($idMonitor)
    {
        $sumRating = Rating::where('ratings.id_monitor', '=', $idMonitor)
            ->sum('ratings.rating');
        return $sumRating;
    }

    public static function getCountRating($idMonitor)
    {
        $countRating = Rating::where('ratings.id_monitor', '=', $idMonitor)
            ->count();
        return $countRating;
    }

    public static function get($idMonitor)
    {
        $somaAvaliacao = self::getSumRating($idMonitor);
        $numeroAvaliacao = self::getCountRating($idMonitor);

        if ($numeroAvaliacao <= 0) $numeroAvaliacao = 1;

        $rating = $somaAvaliacao / $numeroAvaliacao;
        return number_format($rating);
    }
}
