<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;

class AuthenticateController extends Controller
{
   public function authenticate(Request $request){
       $credentials = $request->only('email', 'password');
       try{
           if(!$token = JWTAuth::attempt($credentials)){
               return  $this->errorResponse(401, 'invalid_credentials');
           }
       }catch(\Exception $e){
           return $this->errorResponse(500, $e->getMessage());
       }

       return $this->successResponse(['token'=>$token]);
   }

    public function register(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);

        $user->save();

        return response()->json(compact('user'));
    }
}
