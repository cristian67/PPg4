<?php namespace App\Http\Controllers;

use App\Course;
use App\Disponibility;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use Illuminate\Http\Request;

class SeccionController extends Controller {
    public function __construct()
    {
        $this->middleware('cors');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($idProfesor)
	{
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }


        $profesores = Teacher::find($idProfesor);
        if(!$profesores){
            return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
        }
        $secciones = $profesores->course;


        return response()->json(['datos'=>$secciones],202);
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
	public function store(Request $request,$idProfesor,$idCurso)
	{
       //
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
	public function update(Request $request,$idProfesores,$idDispo,$idCurso)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idProfesor,$idDispo,$idcurso)
	{

	}

}
