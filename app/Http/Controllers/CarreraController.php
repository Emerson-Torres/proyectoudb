<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\tipocarreras;
use Illuminate\Support\Facades\View;
use App\Models\campues;
use App\Models\carreras;

class CarreraController extends Controller
{

    public function index(){
        $lista = tipocarreras::all();
        $lista2 = campues::all();
        $carreras = DB::table('carreras')
            ->join('tipocarreras', 'carreras.id_tipocarrera', '=', 'tipocarreras.id')
            ->join('campues', 'carreras.id_campus', '=', 'campues.id')
            ->select('carreras.*', 'tipocarreras.tipocarrera','campues.nombre_campus')
            ->get();
            //dd($carreras);
        return View::make('index')->with(compact('lista'))->with(compact('lista2'))->with(compact('carreras'));
    }

    public function insertarCarrera(Request $request){
        $txttitulo= $request->get('txttitulo');
        $txtdescripcion= $request->get('txtdescripcion');
        $txturl= $request->get('txturl');
        $cmbcampus= $request->get('cmbcampus');
        $cmbtipo= $request->get('cmbtipocarrera');
        

        carreras::create([
            'titulo_carrera' => $txttitulo,
            'descripcion_carrera' => $txtdescripcion,
            'url_amigable' => $txturl,
            'id_campus' => $cmbcampus,
            'id_tipocarrera' => $cmbtipo
            
        ]);

        return redirect()->route('index');
    }

    public function eliminarCarrera(Request $request){
        carreras::destroy($request->id);  
        return redirect()->route('index');
    }
    
    public function modificarCarrera(Request $request){
        $id= $request->get('txtidmod');
        $txttitulo= $request->get('txtedad');
        $txtdescripcion= $request->get('txtdescripcionmod');
        $txturl= $request->get('txturlmod');
        $cmbcampus= $request->get('cmbcampusmod');
        $cmbtipo= $request->get('cmbtipocarreramod');
        //dd($txttitulo);

        carreras::where('id',$id)->update([
            'titulo_carrera' => $txttitulo,
            'descripcion_carrera' => $txtdescripcion,
            'url_amigable' => $txturl,
            'id_campus' => $cmbcampus,
            'id_tipocarrera' => $cmbtipo
            
        ]);

        return redirect()->route('index');
    }
}
