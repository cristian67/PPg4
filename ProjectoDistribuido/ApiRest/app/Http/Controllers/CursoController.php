<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CursoController extends Controller {
    public function __construct()
    {
        $this->middleware('cors');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }

        return response()->json([Course::all()],202);
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
        if(!$request->get('nombre'))
        {
            return response()->json(['mensaje'=>'datos invalidos o incompletos','codigo'=>'422'],422);
        }

        Course::create($request->all());
        return response()->json(['mensaje'=>'curso ha sido creado'],202);
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

        $cursos = Course::find($id);
        if(!$cursos){
            return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
        }
        return response()->json(['datos'=>$cursos],202);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $metodo = $request->method();

        $curso = Course::find($id);
        if ($metodo==="PATCH") {
            //Por cada atributo:
            //1
            $nombre = $request->get('nombre');
            if ($nombre != null && $nombre != "") {
                $curso->nombre = $nombre;
            }
            $curso->save();
            return response()->json(['mensaje'=>'Curso ha sido editado'],202);
        }
        //Con put, toma toda la wea
        $nombre=$request->get('nombre');
        if (!$nombre){
            return response()->json(['mensaje'=>'datos invalidos'],404);
        }
        $curso->nombre = $nombre;
        $curso->save();
        return response()->json(['mensaje'=>'Curso ha sido editado'],202);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $curso = Course::find($id);
        if (!$curso){
            return response()->json(['mensaje'=>'datos invalidos'],404);
        }

        $rela = $curso->teacher;
        //return $rela;

        //BORRAR PROFESOR
        if($rela=="[]"){
            $curso->delete();
            //$profesor->cursos;
            return response()->json(['mensaje'=>'Curso ha sido borrado'],202);
        }

        //BORRAR PIVOTE ANTES!!!
        return response()->json(['mensaje'=>'Borrar registro en tabla relacionada antes','datos'=>$rela],404);

    }

}
