<?php

namespace App\Http\Controllers\Pdf;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Incidencia;
use App\Observacion;
use Carbon\Carbon;
use App\Sistema;
use App\Departamento;
use App\Categoria;

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

    public function postIncidenteForDate(Request $request)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
       
        $incidencias = Incidencia::whereBetween('fecha', [$request->desde, $request->hasta])
        ->orderBy('id', 'DESC')
        ->get();

        if(!count($incidencias) > 0 ){
            flash('No hay resultado para esta busqueda!')->error();

            return view('reportes.index');
        }
     
        $pdf = \PDF::loadView('reportes.incidencia.incidente_lista', compact('fecha','incidencias', 'sistema','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

        $planilla = 'incidentes_listado'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla); 

       
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


    public function postInformeTecnico(Request $request)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];
        
        $inc = Incidencia::where('codigo', '=',$request->codigo_)->get();


       if(!count($inc) > 0 ){
            flash('No hay resultado para esta busqueda!')->error();

            return view('reportes.index');
        }
        $incidencia = $inc[0];
        $observaciones = Observacion::where('incidencia_id' , '=' , $incidencia->id)->get();
     
        $pdf = \PDF::loadView('reportes.incidencia.informe_tecnico', compact('fecha','incidencia','observaciones','sistema'))
        ->setPaper('Letter', 'portrait');

      

        $planilla = 'informe_tecnico_' . $incidencia->codigo .'_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   

        //return view('reportes.incidencia.incidente', compact('fecha','incidencia','observaciones'));
    }


    
    public function getDepartamentolistsWithUser()
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
        
     
        $departamentos =  \DB::table('users')
        ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('departamentos.nombre', \DB::raw( 'count (*) as usuarios' ))
        ->groupBy('departamentos.nombre')
        ->get();

        $pdf = \PDF::loadView('reportes.incidencia.incidente_por_departamentos', compact('fecha','departamentos','sistema','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

      

        $planilla = 'incidente_por_departamento_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   
    }


    public function getDepartamentolists()
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
        
     
        $departamentos = Departamento::all() ;

        $pdf = \PDF::loadView('reportes.incidencia.incidente_por_departamentos', compact('fecha','departamentos','sistema','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

      

        $planilla = 'incidente_por_departamento_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);   
    }

    public function getDivisioneslists()
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
        
     
        $otic_departamentos = Categoria::all();

        $pdf = \PDF::loadView('reportes.incidencia.divisiones_lista', compact('fecha','otic_departamentos','sistema','newDirectorSAIT'))
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


    public function getHistorial($desde, $hasta , $user)
    {
        $fecha = new Carbon();

        $sistema = Sistema::all()[0];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
     
        if($desde=='null' && $hasta=='null' && $user=='null'){
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->orderBy('historials.id', 'DESC')
                ->get();
        }

        if($user !== 'null' && $desde=='null' && $hasta=='null'){
           
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->where('users.id', $user)
                ->orderBy('historials.id', 'DESC')
                ->get();
        }

        if($desde !=='null' && $hasta !== 'null' && $user==='null' ){
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->whereBetween('fecha', [$desde, $hasta])
                ->orderBy('historials.id', 'DESC')
                ->get();
        }
        
        if($desde !=='null' && $hasta !=='null' && $user !=='null'){
            //filtrar por fechas desde hasta
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->whereBetween('fecha', [$desde, $hasta])
                ->where('users.id', $user)
                ->orderBy('historials.id', 'DESC')
                ->get();   
        }

        $pdf = \PDF::loadView('reportes.historial.index', compact('fecha','historials','sistema','newDirectorSAIT'))
        ->setPaper('Letter', 'portrait');

    
        $planilla = 'reporte_historial_'. $fecha->format('d-m-Y') . '.pdf';

        return $pdf->download($planilla);  
    }


    /*

        $departamentos =  \DB::table('users')
        ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
        ->select('departamentos.nombre', \DB::raw( 'count (*) as usuarios' ))
        ->groupBy('departamentos.nombre')
        ->get();
   */
    
}
