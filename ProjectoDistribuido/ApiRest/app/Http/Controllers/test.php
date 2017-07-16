<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class test extends Controller
{
  private function cadenaValida($cadena){
   $largo = strlen($cadena);
   for ($i=0; $i <$largo ; $i++) {
        if ($cadena[$i] == "*"){
            return false;
        }
   }
   return true;
 }

public function index()
{
  /*
  $client = new \GuzzleHttp\Client();
  $res = $client->request('GET', 'https://sepa.utem.cl/rest/api/v1/academia/docentes', ['auth' => ['IpczMUGPUJ','a9af34f78954c3f890e7446bda647787']]);
  //echo $res->getStatusCode();
  //var_dump($res);

  $res = (string)$res->getBody();
  //echo $res;
  //$decode = json_decode($res->getBody());
  //dd($decode);

  $res = json_decode($res, true);
  foreach ($res as $key) {
    if($key['departamento']['id']==18 and strlen($key['rut'])>8){
      print_r($key['nombres']);
      print_r($key['apellidos']);
      print_r($key['rut']);
      //DB::table('teachers')->insert(array('nombres'=>$key['nombres'],'apellidos'=>$key['apellidos'],'rut'=>$key['rut']));
    }
  }
*/
  $asignaturas = new \GuzzleHttp\Client();
  $res2 = $asignaturas->request('GET','https://sepa.utem.cl/rest/api/v1/docencia/asignaturas', ['auth' => ['IpczMUGPUJ','a9af34f78954c3f890e7446bda647787']]);
  $res2 = (string)$res2->getBody();
  $res2 = json_decode($res2, true);
  foreach ($res2 as $key){
    if ($this->cadenaValida($key['codigo'])==true){
      if($key['departamento']['id'] == 18  ){
        DB::table('courses')->insert(array('nombre'=>$key['nombre'],'codigo'=>$key['codigo'],'periodos'=>floor($key['creditos']/2)));
      }
    }
  }

  $ramos = DB::table('courses')->get();
  foreach ($ramos as $key) {
    $ramo= $key->codigo;
    $res3 = new \GuzzleHttp\Client();
    try{
    $res3 = $res3->request('GET','https://sepa.utem.cl/rest/api/v1/docencia/asignaturas/'.$ramo.'/cursos', ['auth' => ['IpczMUGPUJ','a9af34f78954c3f890e7446bda647787']]);
  }catch (\GuzzleHttp\Exception\ClientException $e){
    continue;

  }
    $res3 = (string)$res3->getBody();
    $res3 = json_decode($res3, true);
    foreach($res3 as $key2){
      if ($key2['anio']==2017){
        //printf($key2['anio']. "-" . $key2['seccion']. " ");
        $request = DB::table('teachers')->where('rut', "=",$key2['docente']['rut'])->get();
        if($request){
          foreach ($request as $key3) {
            //echo $key->id."-".$key3->nombres." ".$key3->apellidos;
            # code...
            DB::table('sections')->insert(array('seccion'=>$key2['seccion'],'teacher_1_id'=>$key3->id,'course_1_id'=>$key->id));
          }
        }else{
          if (strlen($key2['docente']['rut'])<5){
              continue;
          }
          //$profesor = new Teacher();
          $id = DB::table('teachers')->insertGetId(array('nombres'=>$key2['docente']['nombres'],'apellidos'=>$key2['docente']['apellidos'],'rut'=>$key2['docente']['rut']));
          DB::table('sections')->insert(array('seccion'=>$key2['seccion'],'teacher_1_id'=>$id,'course_1_id'=>$key->id));
          //$id = DB::table('teachers')->getId()
        }
      }
    }
  }
  echo "[OK]";
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
