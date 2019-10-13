<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailMonitor;
use Exception;
use Mail;

class SendMailMonitorController extends Controller
{
    public function send(Request $request)
    {
        $user = $request->user;
        $monitor = $request->monitor;
        $mensagem = $request->mensagem;

        try {
            \Mail::to($monitor['email'])->send(new SendMailMonitor($user, $monitor['name'], $mensagem));
            return response()->json(['success' => 'E-mail enviado com sucesso!'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorised'], 500);
        }
    }
}
