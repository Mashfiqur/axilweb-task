<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(LoginRequest $request){
        
        if($data = $request->validated()){
            if(Auth::attempt($data)){ 
                $user = User::where('email', $data['email'])->with(['user_role.role'])->first(); 
                $success['token'] =  $user->createToken('UniverstyApp')-> accessToken; 
                $success['user'] =  new UserResource($user);
       
                return $this->sendResponse($success, 'User login successfully.');
            } 
            else{ 
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            } 
        }
        
    }
}
