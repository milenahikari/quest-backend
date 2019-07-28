<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Level;

class LevelController extends Controller
{
    public function index(Request $request) {
        return Level::all();
    }
}
