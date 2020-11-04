<?php

namespace App\Http\Controllers\Pdf;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Incidencia;
use App\Observacion;
use Carbon\Carbon;
use App\Sistema;


class PdfIncidenteController extends Controller
{
    
   // public $sistema = [];
    
    public function __construct()
    {
       // $this->sistema = Sistema::all()[0];
    }
    
    public function getIncidente($id)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
       
        $incidencia = Incidencia::find($id);

        $observaciones = Observacion::where('incidencia_id' , '=' , $incidencia->id)->get();
     
        $pdf = \PDF::loadView('reportes.incidencia.incidente', compact('fecha','incidencia','observaciones','sistema','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

        $planilla = 'incidente_' . $incidencia->codigo .'_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla); 

       /* return view('reportes.incidencia.incidente_por_departamento', compact('sistema'));*/
    }


    public function getInformeTecnico($id)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];
        
        $incidencia = Incidencia::find($id);

        $observaciones = Observacion::where('incidencia_id' , '=' , $incidencia->id)->get();
     
        $pdf = \PDF::loadView('reportes.incidencia.informe_tecnico', compact('fecha','incidencia','observaciones','sistema'))
        ->setPaper('Letter', 'portrait');

      

        $planilla = 'informe_tecnico_' . $incidencia->codigo .'_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   

        //return view('reportes.incidencia.incidente', compact('fecha','incidencia','observaciones'));
    }


    public function getInformeTecnicoListado(Request $request)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
        
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $estado = $request->get('estado');
        
        
        if(!empty($desde) && !empty($hasta) && !empty($estado)){

            $incidencias = Incidencia::orderBy('id', 'DESC')
            ->whereBetween('fecha',[$request->get('desde'),$request->get('hasta')])
            ->where('verificada', '=' , $estado)
            ->get();
            
        }elseif(!empty($request->get('desde')) && !empty($request->get('hasta')) ){
            $incidencias = Incidencia::orderBy('id', 'DESC')
            ->whereBetween('fecha',[$request->get('desde'),$request->get('hasta')])
            ->get();
        }else{
            $incidencias = Incidencia::orderBy('id', 'DESC')->get();
        }


        $pdf = \PDF::loadView('reportes.incidencia.informe_tecnico_listado', compact('fecha','incidencias','sistema','desde','hasta','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

      
        $planilla = 'informe_tecnico_list_' .  $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   
    }


    
    public function getIncidenteDepartamento()
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];
        
     
        $departamentos =  \DB::table('users')
        ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('departamentos.nombre', \DB::raw( 'count (*) as usuarios' ))
        ->groupBy('departamentos.nombre')
        ->get();

        $pdf = \PDF::loadView('reportes.incidencia.incidente_por_departamento', compact('fecha','departamentos','sistema'))
        ->setPaper('Letter', 'portrait');

      

        $planilla = 'incidente_por_departamento_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   
    }


    public function getIncidentePorFalla($falla_id)
    {
        
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $incidencia =  \DB::table('incidencias')
        ->join('motivos', 'motivos.id', '=', 'incidencias.motivo_id')
        ->join('users', 'users.id', '=', 'incidencias.user_id')
        ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('motivos.nombre', \DB::raw( 'count (*) as incidente' ))
        ->where('motivos.id', '=',$falla_id)
        ->groupBy('motivos.nombre')
        ->get();


        $pdf = \PDF::loadView('reportes.incidencia.incidente_por_departamento', compact('fecha','incidencia','sistema'))
        ->setPaper('Letter', 'portrait');

        $planilla = 'incidente_por_departamento_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla); 
    }


    public function getIncidentesPorCondicionEstado($condicion_id , $estado_id)
    {

    }


    /*

        $departamentos =  \DB::table('users')
        ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('departamentos.nombre', \DB::raw( 'count (*) as usuarios' ))
        ->groupBy('departamentos.nombre')
        ->get();
   */
    
}
