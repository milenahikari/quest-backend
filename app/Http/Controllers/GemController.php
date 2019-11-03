<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Gem;

class GemController extends Controller
{
    public function getGems()
    {
        return Gem::get();
    }

    public function getColorsGems()
    {
        return Gem::getColors();
    }
}
