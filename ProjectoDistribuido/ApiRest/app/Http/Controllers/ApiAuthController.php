<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiAuthController extends Controller
{
  /*public function __construct()
  {
      $this->middleware('jwt.auth', ['except'=>['userAuth']]);
  }*/

  public function index(){
    return response()->json(['hola'=>'xd']);
  }

  public function userAuth(Request $request){
      $email = $request->get('email');
      $pw = $request->get('password');
      $credentials = $request->only('email','password');
      $token = null;


        try {
          if(!$token = \JWTAuth::attempt($credentials)){
            return response()->json(['error'=>'datos invalidos','a'=>$email,'b'=>$pw]);
          }
        } catch (Exception $e) {
          return response()->json(['error'=>'algo salio mal'],500);
        }

        $user = \JWTAuth::toUser($token);
        return response()->json(compact('token','user'));
    }
}
