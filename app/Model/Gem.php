<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gem extends Model
{
    public static function get()
    {
        return Gem::select('gems.icon', 'gems.title', 'gems.class')
            ->get();
    }

    public static function getColors()
    {
        $colors = Gem::select('gems.class')
            ->get();
        if (count($colors) > 0) {
            $levels = [];
            foreach ($colors as $key => $value) {
                $levels[]['level'] = $value['class'];
            }
            return $levels;
        }
    }
}
