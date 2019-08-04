<?php
    namespace App\Http\Controllers\API;

    use Illuminate\Http\Request; 
    use App\Http\Controllers\Controller; 
    use App\User; 
    use Illuminate\Support\Facades\Auth; 
    use Validator;

    class UserController extends Controller 
    {
        public $successStatus = 200;
        public $errorStatus = 401;

        /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function login(){ 
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp')->accessToken; 

                return response()->json(['success' => $success], $this->successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'Unauthorised'], 401); 
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
                return response()->json(['error'=>$validator->errors()], 401);            
            }

            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['name'] =  $user->name;
            $success['id'] =  $user->id;

            return response()->json(['success'=>$success], $this->successStatus); 
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
        /** 
         * update user 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function update(Request $request)
        {
            try {
                $user = User::find($request->id_user);
                $user->id_city    = $request->id_city;
                $user->course     = $request->course;
                $user->teach      = $request->teach;
                $user->created_at = date('Y-m-d H:i:s');
                $user->updated_at = null;
                $user->save();

                return response()->json(['success' => 'Sucesso ao cadastrar usuário'], $this->successStatus);

            } catch(Exception $e){

                return response()->json(['error' => 'Erro ao cadastrar usuário'], $this->errorStatus); 
            }

        }
}