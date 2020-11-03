<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Persona;

use App\Socio;

use App\Motivo;

use App\Incidencia;

use App\Historial;

use App\Observacion;

use App\Notificacion;

use Carbon\Carbon;

use Auth;

use Yajra\Datatables\Facades\Datatables;


class AjaxController extends Controller
{
   
   
    public function getPersonaAjax($ci)
    {
    	if(!empty($ci)){

    		$persona = Persona::where('ci' , $ci)->get();

    	} else {

    		$persona = [];
    	}


    	return response()->json($persona);
    }


    //activar incidente cuando ya a sido completado

    public function verificarIncidente($id)
    {
 

        $incidente = Incidencia::find($id);

        $incidente->verificada = true;
    

        $in = $incidente->save();


    	return response()->json($in);
    }



    public function getIncidentes()
    {
 
       if(Auth::user()->tipo == 4 || Auth::user()->tipo == 1){
            $incidencias = Incidencia::join('motivos','motivos.id' , '=' , 'incidencias.motivo_id')
            ->join('categorias','categorias.id' , '=' , 'motivos.categoria_id')
            ->join('users','users.id' , '=' , 'incidencias.user_id')
            ->join('personas','personas.id' , '=' , 'users.persona_id')
            ->join('departamentos','departamentos.id' , '=' , 'users.departamento_id')
            ->select('categorias.nombre as categoria','motivos.id as mid' , 'motivos.nombre as motivo' , 'motivos.categoria_id',
            'incidencias.id as iid', 'incidencias.asignada', 'incidencias.verificada' , 
            'incidencias.user_id_asignado','incidencias.hora','incidencias.fecha','incidencias.estado_id',
            'incidencias.codigo',
            'personas.p_nombre', 'personas.p_apellido','users.id as uid', 'users.tipo','departamentos.nombre as departamento')
            ->where('incidencias.asignada', '=' ,false)
            ->orderBy('incidencias.id', 'DESC')
            ->get();
       }

       if(Auth::user()->tipo == 2){
        $incidencias = Incidencia::join('motivos','motivos.id' , '=' , 'incidencias.motivo_id')
        ->join('categorias','categorias.id' , '=' , 'motivos.categoria_id')
        ->join('users','users.id' , '=' , 'incidencias.user_id')
        ->join('personas','personas.id' , '=' , 'users.persona_id')
        ->join('departamentos','departamentos.id' , '=' , 'users.departamento_id')
        ->select('categorias.nombre as categoria','motivos.id as mid' , 'motivos.nombre as motivo' , 'motivos.categoria_id',
        'incidencias.id as iid', 'incidencias.asignada', 'incidencias.verificada' , 'incidencias.user_id',
        'incidencias.user_id_asignado','incidencias.hora','incidencias.fecha','incidencias.estado_id',
        'personas.p_nombre', 'personas.p_apellido','users.id as uid', 'users.tipo','departamentos.nombre as departamento')
        ->where('incidencias.asignada', '=' ,true)
        ->where('incidencias.verificada', '=' ,false)
        ->where('incidencias.user_id_asignado', '=' , Auth::user()->id)
        ->orderBy('incidencias.id', 'DESC')
        ->get(); 
       }

       if(Auth::user()->tipo == 3){
        $incidencias = Incidencia::join('motivos','motivos.id' , '=' , 'incidencias.motivo_id')
        ->join('categorias','categorias.id' , '=' , 'motivos.categoria_id')
        ->join('users','users.id' , '=' , 'incidencias.user_id')
        ->join('personas','personas.id' , '=' , 'users.persona_id')
        ->join('departamentos','departamentos.id' , '=' , 'users.departamento_id')
        ->select('categorias.nombre as categoria','motivos.id as mid' , 'motivos.nombre as motivo' , 'motivos.categoria_id',
        'incidencias.id as iid', 'incidencias.asignada', 'incidencias.verificada' , 'incidencias.user_id',
        'incidencias.user_id_asignado','incidencias.hora','incidencias.fecha','incidencias.estado_id',
        'personas.p_nombre', 'personas.p_apellido','users.id as uid', 'users.tipo','departamentos.nombre as departamento')
        ->where('incidencias.user_id', '=' , Auth::user()->id)
        ->orderBy('incidencias.id', 'DESC')
        ->get(); 
       }

       

    	return response()->json($incidencias);
    }


    public function getMotivos($id)
    {
        $motivos = Motivo::where('categoria_id', '=' , $id)->get();

        return response()->json($motivos);
    }


    public function getCountObser()
    {
       // $notificaciones = Observacion::where('user_id', '!=' , Auth::user()->id)
        //->where('visto', '=' , false)->count();
        $coutNoti = [];
        if(Auth::user()->tipo == 2){
            $coutNoti = Observacion::join('incidencias','incidencias.id' , '=' , 'observaciones.incidencia_id')
            ->where('incidencias.user_id_asignado', '=' , Auth::user()->id)
            ->where('incidencias.verificada', '=' , false)
            ->where('observaciones.user_id', '!=' , Auth::user()->id)
            ->where('observaciones.visto', '=' , false)->count();
        }

        if(Auth::user()->tipo == 3 || Auth::user()->tipo == 4){
            $coutNoti = Observacion::join('incidencias','incidencias.id' , '=' , 'observaciones.incidencia_id')
            ->where('incidencias.user_id', '=' , Auth::user()->id)
            ->where('incidencias.verificada', '=' , false)
            ->where('observaciones.user_id', '!=' , Auth::user()->id)
            ->where('observaciones.visto', '=' , false)->count();
        }
        return response()->json($coutNoti);
    }

    public function getObservaciones()
    {
        
        $notificaciones = Observacion::join('incidencias','incidencias.id' , '=' , 'observaciones.incidencia_id')
            ->join('users','users.id' , '=' , 'observaciones.user_id')
            ->join('categorias','categorias.id' , '=' , 'users.categoria_id')
            ->join('personas','personas.id' , '=' , 'users.persona_id')
            ->select('categorias.nombre as categoria','users.id as uid', 'users.tipo',
             'observaciones.observacion','observaciones.visto','observaciones.id',
             'incidencias.id as iid', 'incidencias.codigo','incidencias.user_id', 'personas.p_nombre', 'personas.p_apellido')
           // ->where('incidencias.user_id', '!=' , Auth::user()->id)
            ->where('observaciones.visto', '=' , false)
            ->where('incidencias.verificada', '=' , false)
            ->orderBy('incidencias.id', 'DESC')->get();
    
        return response()->json($notificaciones);
    }

    public function setNotificacion($observacion , $incidencia_id, $observacion_id)
    {
       
        $observacion = Observacion::create([
            'observacion' => $observacion,
            'incidencia_id' => $incidencia_id,
            "user_id" => Auth::user()->id
        ]);

       $obs = $observacion->save();
   
        return response()->json($obs);
        
    }

    public function updateNotificacion($observacion_id)
    {
        $notificacion =   Observacion::find($observacion_id);
     
        $notificacion->visto =  true;

        $notificacion->save();

        return response()->json($notificacion);
    }
    

    public function getCountNoti()
    {
       // $notificaciones = Observacion::where('user_id', '!=' , Auth::user()->id)
        //->where('visto', '=' , false)->count();
        $coutNoti = [];

        $coutNoti = Notificacion::where('user_id', '=' , Auth::user()->id)
            ->where('visto', '=' , false)
            ->count();
        return response()->json($coutNoti);
        /*
        if(Auth::user()->tipo == 2){
            $coutNoti = Notificacion::join('incidencias','incidencias.id' , '=' , 'notificacions.incidencia_id')
            ->where('incidencias.user_id_asignado', '=' , Auth::user()->id)
            ->where('incidencias.verificada', '=' , false)
            ->where('notificacions.user_id', '!=' , Auth::user()->id)
            ->where('notificacions.visto', '=' , false)->count();
        }

        if(Auth::user()->tipo == 3 || Auth::user()->tipo == 4){
            $coutNoti = Notificacion::join('incidencias','incidencias.id' , '=' , 'notificacions.incidencia_id')
            ->where('incidencias.user_id', '=' , Auth::user()->id)
            ->where('incidencias.verificada', '=' , false)
            ->where('notificacions.user_id', '!=' , Auth::user()->id)
            ->where('notificacions.visto', '=' , false)->count();
        }

        */
        
    }


    public function getNotificaciones()
    {
        
        $notificaciones = Notificacion::where('user_id' , '=' , Auth::user()->id)
            ->where('visto', '=' , false)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json($notificaciones);
    }


    //filter para pdf

    public function getInformeTecnicoDay()
    {
        /*$informes = Incidencia::where('fecha', '=', '05-03-2020')//Carbon::now('America/Caracas')->format('Y-m-d')
                    ->where('user_id_asignado' , '=' , Auth::user()->id)->orderBy('incidencias.id', 'DESC')
                    ->get();
        */
        $incidencias = Incidencia::join('motivos','motivos.id' , '=' , 'incidencias.motivo_id')
                    ->join('categorias','categorias.id' , '=' , 'motivos.categoria_id')
                    ->join('users','users.id' , '=' , 'incidencias.user_id')
                    ->join('personas','personas.id' , '=' , 'users.persona_id')
                    ->join('departamentos','departamentos.id' , '=' , 'users.departamento_id')
                    ->select('categorias.nombre as categoria','motivos.id as mid' , 
                    'motivos.nombre as motivo' , 'motivos.categoria_id',
                    'incidencias.id as iid', 'incidencias.asignada', 'incidencias.verificada' , 
                    'incidencias.user_id_asignado','incidencias.hora','incidencias.fecha',
                    'incidencias.estado_id',
                    'incidencias.codigo',
                    'personas.p_nombre', 'personas.p_apellido','users.id as uid', 'users.tipo',
                    'departamentos.nombre as departamento')
                    
                    ->whereBetween('fecha', [$request->input('desde'), $request->input('hasta')])//Carbon::now('America/Caracas')->format('Y-m-d')
                    ->where('user_id_asignado' , '=' , Auth::user()->id)
                    ->orderBy('incidencias.id', 'DESC')
                    ->get();
        return response()->json($incidencias);
        
    }


    public function getIncidenciaTable()
    {
        $incidencias = Incidencia::join('motivos','motivos.id' , '=' , 'incidencias.motivo_id')
        ->join('categorias','categorias.id' , '=' , 'motivos.categoria_id')
        ->join('users','users.id' , '=' , 'incidencias.user_id')
        ->join('personas','personas.id' , '=' , 'users.persona_id')
        ->join('departamentos','departamentos.id' , '=' , 'users.departamento_id')
        ->select('categorias.nombre as categoria','motivos.id as mid' , 'motivos.nombre as motivo' , 'motivos.categoria_id',
        'incidencias.id as iid', 'incidencias.asignada', 'incidencias.verificada' , 'incidencias.codigo',
        'incidencias.user_id_asignado','incidencias.hora','incidencias.fecha','incidencias.estado_id',
        'personas.p_nombre', 'personas.p_apellido','users.id as uid', 'users.tipo','departamentos.nombre as departamento')
        ->where('incidencias.asignada', '=' ,false)
        ->orderBy('incidencias.id', 'DESC')
        ->get();

        
        return Datatables::collection($incidencias)->make();
    }
}
