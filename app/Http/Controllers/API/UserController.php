<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\MonitorController;
use App\Model\UploadImage;

class UserController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->accessToken;

            $success['profile'] = [
                'id' => $user->id,
                'name' => $user->name,
                'course' => $user->course,
                'email' => $user->email,
                'photo' => $user->photo,
                'id_city' => $user->id_city,
                'teach' => $user->teach,
                'phone' => '',
                'share' => '',
                'id_monitor' => ''
            ];

            if ($user->teach) {
                $dadosMonitor = MonitorController::dataMonitor($user->id);
                $success['profile']['phone'] = $dadosMonitor[0]->phone;
                $success['profile']['share'] = $dadosMonitor[0]->share;
                $success['profile']['id_monitor'] = $dadosMonitor[0]->id_monitor;
            }

            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        $input['photo'] = (!empty($input['photo'])) ?  UploadImage::send('quest', $input['photo']) : null;

        $input['password'] = bcrypt($input['password']);

        //Salva dados no banco
        $user = User::create($input);

        //Retorno sucesso
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['profile'] = [
            'id' => $user->id,
            'name' => $user->name,
            'course' => $user->course,
            'email' => $user->email,
            'id_city' => $user->id_city,
            'photo' => $user->photo
        ];
        return response()->json(['success' => $success], $this->successStatus);
    }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function getUser($idUser)
    {
        return User::getUserEdit($idUser);
    }

    public function getUserContact($idUser)
    {
        return User::getUserContact($idUser);
    }

    public function validateEmail($email)
    {
        return User::getEmail($email);
    }

    public function updateDados($idUser, Request $dados)
    {
        $user = User::updateDados($idUser, $dados);

        return $user;
    }

    public function updateContact($idUser, Request $dados)
    {
        $user = User::updateCity($idUser, $dados);
        //se o usuário ensina, atualiza o telefone tmb      
        if ($dados[0] == 1 || $dados[0] == true) {
            User::updatePhone($dados);
        }
    }

    public function updatePassword($idUser, Request $dados)
    {
        return User::updatePassword($idUser, $dados);
    }
}
