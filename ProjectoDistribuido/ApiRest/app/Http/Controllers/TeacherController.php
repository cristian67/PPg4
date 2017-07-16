<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Teacher;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class TeacherController extends Controller
{
  public function __construct()
  {
      $this->middleware('cors');
  }

  public function index()
  {
      try {
          if(!$email = \JWTAuth::parseToken()->toUser()){
              return response()->json(['user not found', 404]);
          }
      } catch (Exception $e){
          return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
      }

    return response()->json(['datos'=>Teacher::all()],202);
  }

/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
public function create()
{
  //
}

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
public function store(Request $request)
{

}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function show($id)
{

  try {
    if(!$email = \JWTAuth::parseToken()->toUser()){
      return response()->json(['user not found', 404]);
    }
  } catch (Exception $e){
    return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
  }

  $profesor = Teacher::find($id);
  if(!$profesor){
          return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
      }
  return response()->json(['datos'=>$profesor],202);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function edit($id)
{
  //
}

/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */
public function update(Request $request, $id)
{
  try {
    if(!$email = \JWTAuth::parseToken()->toUser()){
      return response()->json(['user not found', 404]);
    }
  } catch (Exception $e){
    return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
  }
      $metodo = $request->method();
      $profesor = Teacher::find($id);

      if ($metodo==="PATCH"){

          //Por cada atributo:
          //1
          $nombre=$request->get('nombre');
          if ($nombre!=null && $nombre!=""){
              $profesor->name=$nombre;
          }
          //2
          $apellido=$request->get('apellido');
          if ($apellido!=null && $apellido!=""){
              $profesor->apellido=$apellido;
          }
          //3
          //5
          $rut=$request->get('rut');
          if ($rut!=null && $rut!=""){
              $profesor->rut=$rut;
          }
          /*
          $email=$request->get('email');
          if ($email!=null && $email!=""){
              $profesor->email=$email;
          }
          //4
          $password=$request->get('password');
          if ($password!=null && $password!=""){
              $profesor->password=$password;
          }
          //6
          $departamento=$request->get('departamento');
          if ($departamento!=null && $departamento!=""){
              $profesor->departamento=$departamento;
          }
          //7
          $jerarquia=$request->get('jerarquia');
          if ($jerarquia!=null && $jerarquia!=""){
              $profesor->jerarquia=$jerarquia;
          }
          //8
          $contrato=$request->get('contrato');
          if ($contrato!=null && $contrato!=""){
             $profesor->contrato=$contrato;
          }*/
          $profesor->save();
          return response()->json(['mensaje'=>'profesor ha sido editado'],202);
      }


      //Con put, toma tados la wea
      $nombre=$request->get('nombre');
      if (!$nombre){
          return response()->json(['mensaje'=>'datos invalidos'],404);
      }
      //2
      $apellido=$request->get('apellido');
      if (!$apellido){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
      //3
/*
      $email=$request->get('email');
      if (!$email){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
      //4
      $password=$request->get('password');
      if (!$password){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
      //5
*/
      $rut=$request->get('rut');
      if (!$rut){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
/*
      //6
      $departamento=$request->get('departamento');
      if (!$departamento){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
      //7
      $jerarquia=$request->get('jerarquia');
      if (!$jerarquia){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
      //8
      $contrato=$request->get('contrato');
      if (!$contrato){
          return response()->json(['mensaje'=>'datos invalidos'],404);

      }
*/
      //Paso la prueba:
      $profesor->nombre=$nombre;
      $profesor->apellido=$apellido;
      $profesor->rut=$rut;
/*
      $profesor->email=$email;
      $profesor->password=$password;
      $profesor->departamento=$departamento;
      $profesor->jerarquia=$jerarquia;
      $profesor->contrato=$contrato;
*/
      //Guardar
      $profesor->save();
      return response()->json(['mensaje'=>'Profesor ha sido editado'],202);

}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($id)
{
  try {
    if(!$email = \JWTAuth::parseToken()->toUser()){
      return response()->json(['user not found', 404]);
    }
  } catch (Exception $e){
    return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
  }
    $profesor = Teacher::find($id);
      if (!$profesor){
          return response()->json(['mensaje'=>'datos invalidos'],404);
      }

      $rela = $profesor->course;
      //return $rela;

      //BORRAR PROFESOR
      if($rela=="[]"){
          $profesor->delete();
          //$profesor->cursos;
          return response()->json(['mensaje'=>'Profesor ha sido borrado'],202);
      }

      //BORRAR PIVOTE ANTES!!!
      return response()->json(['mensaje'=>'Borrar registro en tabla relacionada antes','datos'=>$rela],404);

}

}
