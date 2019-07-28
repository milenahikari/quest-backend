<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Gem;

class GemController extends Controller
{
    public function index(Request $request) {
        return Gem::all();     
    }
}
