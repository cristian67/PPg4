<?php

namespace App\Http\Controllers;

use App\Disponibility;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use Illuminate\Http\Request;

class ProfeDispoController extends Controller
{


  public function __construct()
  {
      $this->middleware('cors');
  }

  public function index($id)
  {

    try {
      if(!$email = \JWTAuth::parseToken()->toUser()){
        return response()->json(['user not found', 404]);
      }
    } catch (Exception $e){
      return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
    }

    $profesor = Teacher::find($id);
    $dispo = $profesor->disponibility;

        if(!$profesor){
            return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
        }
        return response()->json(['datos'=>$dispo],202);
  }

/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
public function create()
{

}

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
public function store(Request $request, $id)
{
    try {
        if(!$email = \JWTAuth::parseToken()->toUser()){
            return response()->json(['user not found', 404]);
        }
    } catch (Exception $e){
        return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
    }


      //Encontrar id
      $profesor = Teacher::find($id);
      if(!$profesor){
          return response()->json(['mensaje' => 'datos invalidos o incompletos profesor', 'codigo' => '404'], 404);
      }
      //ver campos
      if(!$request->get('dia'))
      {
        return response()->json(['mensaje'=>'datos invalidos o incompletos dia','codigo'=>'422'],422);
      }
      //Crear
      Disponibility::create([
          'dia'      =>$request->get('dia'),
          'periodo_1'=>$request->get('periodo_1'),
          'periodo_2'=>$request->get('periodo_2'),
          'periodo_3'=>$request->get('periodo_3'),
          'periodo_4'=>$request->get('periodo_4'),
          'periodo_5'=>$request->get('periodo_5'),
          'periodo_6'=>$request->get('periodo_6'),
          'periodo_7'=>$request->get('periodo_7'),
          'periodo_8'=>$request->get('periodo_8'),
          'teacher_id'=>$id
      ]);

      return response()->json(['mensaje'=>'La disponibilidad ha sido creada','codigo'=>"201"],201);
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function show($idprof,$idDispo)
{
    try {
        if(!$email = \JWTAuth::parseToken()->toUser()){
            return response()->json(['user not found', 404]);
        }
    } catch (Exception $e){
        return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
    }

        $prof = Teacher::find($idprof);
        if(!$prof){
            return response()->json(['Mensaje'=>'No se encontro registro profesor','codigo'=> 404],404);
        }

        $dispo = $prof->disponibility()->find($idDispo);

        if(!$dispo){
            return response()->json(['Mensaje'=>'No se encontro registro disponibilidad','codigo'=> 404],404);
        }

        return response()->json(['datos'=>$dispo],202);

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
public function update(Request $request,$idProfe,$idDispo)
{

  try {
    if(!$email = \JWTAuth::parseToken()->toUser()){
      return response()->json(['user not found', 404]);
    }
  } catch (Exception $e){
    return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
  }

      $metodo = $request->method();
      $profesor = Teacher::find($idProfe);
      //El departamento existe?:
      if(!$profesor){
          return response()->json(['mensaje'=>'datos invalidos profesor'],404);
      }
      //encontrar sala
      $dispo = $profesor->disponibility()->find($idDispo);
      //existe dispo?
      if(!$dispo){
          return response()->json(['mensaje'=>'datos invalidos disponibilidad'],404);
      }

      $dia = $request->get('dia');
      $periodo_1 = $request->get('periodo_1');
      $periodo_2 = $request->get('periodo_2');
      $periodo_3 = $request->get('periodo_3');
      $periodo_4 = $request->get('periodo_4');
      $periodo_5 = $request->get('periodo_5');
      $periodo_6 = $request->get('periodo_6');
      $periodo_7 = $request->get('periodo_7');
      $periodo_8 = $request->get('periodo_8');

      if ($metodo==="PATCH"){
          //1
          if ($dia!=null && $dia!=""){
              $dispo->dia=$dia;
          }
          //2
          if ($periodo_1!=null && $periodo_1!=""){
              $dispo->periodo_1=$periodo_1;
          }
          //3
          if ($periodo_2!=null && $periodo_2!=""){
              $dispo->periodo_2=$periodo_2;
          }
          //4
          if ($periodo_3!=null && $periodo_3!=""){
              $dispo->periodo_3=$periodo_3;
          }
          //5
          if ($periodo_4!=null && $periodo_4!=""){
              $dispo->periodo_4=$periodo_4;
          }
          //6
          if ($periodo_5!=null && $periodo_5!=""){
              $dispo->periodo_5=$periodo_5;
          }
          //7
          if ($periodo_6!=null && $periodo_6!=""){
              $dispo->periodo_6=$periodo_6;
          }
          //8
          if ($periodo_7!=null && $periodo_7!=""){
              $dispo->periodo_7=$periodo_7;
          }
          //9
          if ($periodo_8!=null && $periodo_8!=""){
              $dispo->periodo_8=$periodo_8;
          }
          $dispo->save();
          return response()->json(['mensaje'=>'Disponibilidad ha sido editado'],202);
      }

      //PUT
      if(!$dia){
          return response()->json(['mensaje'=>'datos invalidos dia'],404);
      }
      if(!$periodo_1){
          return response()->json(['mensaje'=>'datos invalidos periodo 1'],404);
      }
      if(!$periodo_2){
          return response()->json(['mensaje'=>'datos invalidos periodo 2'],404);
      }
      if(!$periodo_3){
          return response()->json(['mensaje'=>'datos invalidos periodo 3'],404);
      }
      if(!$periodo_4){
          return response()->json(['mensaje'=>'datos invalidos periodo 4'],404);
      }
      if(!$periodo_5){
          return response()->json(['mensaje'=>'datos invalidos periodo 5'],404);
      }
      if(!$periodo_6){
          return response()->json(['mensaje'=>'datos invalidos periodo 6'],404);
      }
      if(!$periodo_7){
          return response()->json(['mensaje'=>'datos invalidos periodo 7'],404);
      }
      if(!$periodo_8){
          return response()->json(['mensaje'=>'datos invalidos periodo 8'],404);
      }

      //asignar
      $dispo->dia=$dia;
      $dispo->periodo_1=$periodo_1;
      $dispo->periodo_2=$periodo_2;
      $dispo->periodo_3=$periodo_3;
      $dispo->periodo_4=$periodo_4;
      $dispo->periodo_5=$periodo_5;
      $dispo->periodo_6=$periodo_6;
      $dispo->periodo_7=$periodo_7;
      $dispo->periodo_8=$periodo_8;
      $dispo->save();
      return response()->json(['mensaje'=>'Disponibilidad ha sido editado'],202);
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($idProfe, $idDispo)
{

  try {
    if(!$email = \JWTAuth::parseToken()->toUser()){
      return response()->json(['user not found', 404]);
    }
  } catch (Exception $e){
    return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
  }

      //buscar profe
      $profe = Teacher::find($idProfe);
      if(!$profe){
          return response()->json(['mensaje'=>'datos invalidos profesor'],404);
      }

      //buscar sala
      $dispo = $profe->disponibility()->find($idDispo);
      if(!$dispo){
          return response()->json(['mensaje'=>'datos invalidos disponbibilidad'],404);
      }

      //Eliminar:
      $dispo->delete();
      return response()->json(['mensaje'=>'registro eliminado'],200);

  }

}
