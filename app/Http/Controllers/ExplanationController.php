<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Explanation;

class ExplanationController extends Controller
{
    public function index(Request $request) {
        return Explanation::all();
    }
}
