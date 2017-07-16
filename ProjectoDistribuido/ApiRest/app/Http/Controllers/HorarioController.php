<?php namespace App\Http\Controllers;


use App\Schedule;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use Illuminate\Http\Request;

class HorarioController extends Controller {
    public function __construct()
    {
        $this->middleware('cors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($idCurso)
    {
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }

        $cursos = Course::find($idCurso);
        if(!$cursos){
            return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
        }

        $horarios = $cursos->classrooms;

        return response()->json(['datos'=>$horarios],202);

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
    public function store(Request $request, $idCurso,$idSala)
    {
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }

        //ver campos
        if(!$request->get('dia'))
        {
            return response()->json(['mensaje'=>'datos invalidos o incompletos dia','codigo'=>'422'],422);
        }

        //BUSCAR
        $curso = Course::find($idCurso);
        if(!$curso){
            return response()->json(['Mensaje'=>'No se encontro registro de curso','codigo'=> 404],404);
        }
        $sala = Classroom::find($idSala);
        if(!$sala){
            return response()->json(['Mensaje'=>'No se encontro registro de sala','codigo'=> 404],404);
        }
        //CREAR
        Schedule::create([
            'dia'=>$request->get('dia'),
            'periodo_1'=>$request->get('periodo_1'),
            'periodo_2'=>$request->get('periodo_2'),
            'periodo_3'=>$request->get('periodo_3'),
            'periodo_4'=>$request->get('periodo_4'),
            'periodo_5'=>$request->get('periodo_5'),
            'periodo_6'=>$request->get('periodo_6'),
            'periodo_7'=>$request->get('periodo_7'),
            'periodo_8'=>$request->get('periodo_8'),
            'course_2_id'=>$idCurso,
            'class_id'=>$idSala
        ]);
        return response()->json(['mensaje'=>'Horario ha sido creado','codigo'=>"201"],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request,$idCurso,$idHorario,$idSala)
    {
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }


        $metodo = $request->method();

        $horario = Schedule::find($idHorario);
        if(!$horario){
            return response()->json(['mensaje'=>'No se encontro registro horario'],404);
        }
        $curso = Course::find($idCurso);
        if(!$curso){
            return response()->json(['mensaje'=>'No se encontro registro curso'],404);
        }
        $sala = $curso->classrooms()->find($idSala);
        if(!$sala){
            return response()->json(['mensaje'=>'No se encontro registro sala'],404);
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
            if ($dia!=null && $dia!=""){
                $horario->dia=$dia;
            }
            //1
            if ($dia!=null && $dia!=""){
                $horario->dia=$dia;
            }
            //2
            if ($periodo_1!=null && $periodo_1!=""){
                $horario->periodo_1=$periodo_1;
            }
            //3
            if ($periodo_2!=null && $periodo_2!=""){
                $horario->periodo_2=$periodo_2;
            }
            //4
            if ($periodo_3!=null && $periodo_3!=""){
                $horario->periodo_3=$periodo_3;
            }
            //5
            if ($periodo_4!=null && $periodo_4!=""){
                $horario->periodo_4=$periodo_4;
            }
            //6
            if ($periodo_5!=null && $periodo_5!=""){
                $horario->periodo_5=$periodo_5;
            }
            //7
            if ($periodo_6!=null && $periodo_6!=""){
                $horario->periodo_6=$periodo_6;
            }
            //8
            if ($periodo_7!=null && $periodo_7!=""){
                $horario->periodo_7=$periodo_7;
            }
            //9
            if ($periodo_8!=null && $periodo_8!=""){
                $horario->periodo_8=$periodo_8;
            }
            $horario->save();
            return response()->json(['mensaje'=>'Horario ha sido editado'],202);
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
        $horario->dia=$dia;
        $horario->periodo_1=$periodo_1;
        $horario->periodo_2=$periodo_2;
        $horario->periodo_3=$periodo_3;
        $horario->periodo_4=$periodo_4;
        $horario->periodo_5=$periodo_5;
        $horario->periodo_6=$periodo_6;
        $horario->periodo_7=$periodo_7;
        $horario->periodo_8=$periodo_8;
        $horario->save();
        return response()->json(['mensaje'=>'Horario ha sido editado'],202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idCurso, $idHorario,$idSala)
    {
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }


        $cursos = Course::find($idCurso);
        if(!$cursos){
            return response()->json(['Mensaje'=>'No se encontro registro curso','codigo'=> 404],404);
        }
        $horario = Schedule::find($idHorario);
        if(!$horario){
            return response()->json(['Mensaje'=>'No se encontro registro horario','codigo'=> 404],404);
        }
        $salas = $cursos->classrooms()->find($idSala);
        if(!$salas){
            return response()->json(['Mensaje'=>'No se encontro registro sala','codigo'=> 404],404);
        }
        $horario->delete();
        return response()->json(['mensaje'=>'Horario ha sido eliminado'],202);

    }

}
