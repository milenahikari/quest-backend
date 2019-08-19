<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Monitor; 
use Validator;

class MonitorController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;
    
    /** 
     * Registrar dados do monitor 
     * 
     * @return \Illuminate\Http\Response 
    */ 
    public function registerMonitor(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'id_user' => 'required', 
            'phone' => 'required', 
            'share_phone' => 'required', 
        ]);
        
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $user = $request->all();

        //Salva dados no banco
        $monitor = Monitor::create($user); 

        //Retorno id monitor
        $success['id_monitor'] =  $monitor->id;

        return response()->json(['success' => $success], $this->successStatus);

    }
}
