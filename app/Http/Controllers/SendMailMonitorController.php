<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailMonitor;

class SendMailMonitorController extends Controller
{
    public function send(Request $request)
    {
        $user = $request->user;
        $monitor = $request->monitor;
        $mensagem = $request->mensagem;

        \Mail::to($monitor['email'])->send(new SendMailMonitor($user, $monitor['name'], $mensagem));
    }
}
