<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;

class MenuController extends Controller
{
    public function index(Request $request) {
        return Menu::all();
    }
}
