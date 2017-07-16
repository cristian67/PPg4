<?php namespace App\Http\Controllers;

use App\Classroom;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SalaController extends Controller {
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


        return response()->json(['datos'=>Classroom::all()],202);
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
	public function store()
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
        try {
            if(!$email = \JWTAuth::parseToken()->toUser()){
                return response()->json(['user not found', 404]);
            }
        } catch (Exception $e){
            return Response::json(['error'=> $e->getMessage(), HttpResponse::HTTP_UNAUTHORIZED]);
        }


        $salas = Classroom::find($id);
        if(!$salas){
            return response()->json(['Mensaje'=>'No se encontro registro','codigo'=> 404],404);
        }
        return response()->json(['datos'=>$salas],202);
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
