<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student; 

class StudentController extends Controller
{
    public function index(Request $request) {
        return Student::all();     
    }
}
