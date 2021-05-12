<?php

namespace App\Http\Controllers;

use App\Motivo;
use App\Categoria;
use App\Incidencia;
use App\User;

use App\Departamento;
use Charts;
use DB;


use Auth;

use App\Sistema;

use Carbon\Carbon;

//use App\Charts\SampleChart;

class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(){

/*
        $incidenciasd =  \DB::table('incidencias')
        ->join('users', 'users.id', '=', 'incidencias.user_id')
        ->leftJoin('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('departamentos.nombre', \DB::raw( 'count (*) as incidencias' ))
        ->groupBy('departamentos.nombre')
        ->get();

      */

      //dd($incidenciasd);

        $incidencias = [];
        $incidenteS = 0;
        $incidenteP = 0;
        $incidenteA = 0;
        $productividad = 0;
        $incidenteAb=0;$incidenteSin=0;$incidenteEs=0;$incidenteAsin=0;
        
        if(Auth::user()->tipo == 2){
            //se le carga las incidencia que tiene asignadas y abiertas
            $incidencias = Incidencia::where('user_id_asignado', '=' , Auth::user()->id)
            ->orderBy('incidencias.id', 'DESC')
            ->get();
            
            $incidenteA = Incidencia::where('user_id_asignado', '=' , Auth::user()->id)
            ->where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
            ->where('verificada','=', false)->count();

            $incidenteS = Incidencia::where('user_id_asignado', '=' , Auth::user()->id)
            ->where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
            ->where('verificada','=', true)
            ->where('estado_id','=', 2)->count();

            //estado 1 atendida , 2 solucionado, 3 en espera...
            $incidenteP = Incidencia::where('user_id_asignado', '=' , Auth::user()->id)
            ->where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
            ->where('estado_id','=', 3)->count(); //estado pendiente por atender

            //mejorar el porcentaje
            $prod = Incidencia::where('user_id_asignado', '=' , Auth::user()->id)
            ->where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
            ->where('verificada','=', true)->count();

            $productividad = ($prod > 10) ? 10 : $prod;

            
        }

        if(Auth::user()->tipo == 4 || Auth::user()->tipo == 1){
            
            $incidencias = Incidencia::where('asignada', '=' ,false)
            ->orderBy('incidencias.id', 'DESC')
            ->get();

            $incidenteAsin = Incidencia::where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
             ->where('asignada','=', true)->count();

            $incidenteAb = Incidencia::where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
             ->where('verificada','=', false)->count();
 
            $incidenteSin = Incidencia::where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
             ->where('verificada','=', true)
             ->where('estado_id','=', 2)->count();
 
             //estado 1 atendida , 2 solucionado, 3 en espera...
            $incidenteEs = Incidencia::where(DB::raw("extract(MONTH FROM fecha_asignada)"), Carbon::now()->format('m'))
             ->where('estado_id','=', 3)->count(); //estado pendiente por atender

        }

        if(Auth::user()->tipo == 3){
            $incidencias = Incidencia::orderBy('incidencias.id', 'DESC')->get();
        }
        

        $motivos = Motivo::pluck('nombre', 'id');

        $categorias = Categoria::all();

        $users = User::select('users.*')
        ->join('categorias', 'users.categoria_id', '=', 'categorias.id')
        ->where('categorias.nombre' , 'not ilike' , 'ninguno')
        ->get();

        $des = Departamento::pluck('nombre');

        $chart2  = Charts::create('bar', 'highcharts')
        ->elementLabel("Incidente")
        ->title("Incidentes por departamento (Anual)")
        ->labels($des)
        ->values([0,0,1,5,0,2])
        ->responsive(true);

        $chart3  = Charts::create('area', 'highcharts')
        ->elementLabel("Incidente")
        ->title("Incidentes por departamento (Anual)")
        ->labels($des)
        ->values([0,0,1,5,0,2])
        ->responsive(true);

        
        return view('home',
         compact('incidencias','categorias','motivos','users',
         'incidenteS','incidenteP','incidenteA','productividad',
         'chart2','chart3','incidenteAb','incidenteSin','incidenteEs','incidenteAsin'));
    }

}
  



