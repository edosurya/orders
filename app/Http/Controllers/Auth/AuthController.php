<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use \App\Models\User;
use Auth;

class AuthController extends Controller
{

    public $successStatus = 200;

	public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }


	public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->first_name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function logout(Request $request)
    {
        $logout = $request->user()->token()->revoke();
        if($logout){
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
    }

    public function user()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

}
