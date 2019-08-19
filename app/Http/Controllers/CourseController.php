<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course; 
use Validator;

class CourseController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'id_category' => 'required',
            'id_monitor' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        
        }
        $data = $request->all();
        
        $course = Course::create($data);

        return response()->json(['success' => 'Curso cadastrado com sucesso'], $this->successStatus);
        
    }
}
