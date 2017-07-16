<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\http\Controllers\ApiAuthController;

class secure extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }

    public function index(){
		     return response()->json(['datos'=>'Profeasd']);
	  }
    public function show(){

      return response()->json(['profe'=>'ProfeASD']);
    }

    public function hola(){
      try {
        if(!$email = \JWTAuth::parseToken()->toUser()){
          return response()->json(['user not found', 404]);
        }
      } catch (Exception $e){
        return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
      }
      return response()->json(['data'=>'Que tu mirada y la mia..']);
    }
}
