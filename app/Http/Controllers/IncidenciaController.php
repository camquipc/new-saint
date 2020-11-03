<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Incidencia;
use App\User;

use App\Categoria;
use App\Motivo;
use App\Observacion;
use App\Notificacion;
use App\Asignada;
use App\Estado;

use App\helpers;

use Auth;

use Carbon\Carbon;
 



class IncidenciaController extends Controller
{
    private $dat = '';

    public function __construct()
    {
      //  $this->dat = Carbon::now('America/Caracas');
        $this->middleware('auth');
    }
   
    
    public function index(){


        $motivos = Motivo::all();

        $categorias = Categoria::all();


        $users = User::all();


        /*if(Auth::user()->tipo != 'admin'){

            $incidencias = Incidencia::leftJoin('asignadas' , 'asignadas.incidencia_id', '=' , 'incidencias.id')
            ->where('asignadas.user_id' , '=' , Auth::user()->id)->orderBy('incidencias.id', 'DESC')->get();
        }else { */

        $incidencias = Incidencia::orderBy('id', 'DESC')->get();

        return view('incidencia.index', compact('incidencias','motivos','categorias','users') );
    }



    public function show($id){

        $incidencia = Incidencia::find($id);

        $users = User::all();

        $estados = Estado::all();

        $observaciones = Observacion::where('incidencia_id' , '=' , $incidencia->id)
          ->orderBy('observaciones.id', 'DESC')
          ->get();//observaciones si las tiene

        $countObservacion = Observacion::where('incidencia_id' , '=' , $incidencia->id)
        ->where('visto' , '=' , false)->count();

     
        return view('incidencia.show' , compact('incidencia' , 'users','observaciones','estados','countObservacion'));
    }


    public function store(Request $request)
    {
       
            $date = new Carbon();
            $fecha =  $date->format('Y-m-d');
            $hora = $date->toTimeString();

            $go_to_home = false;

            //verificamos si el incidente lo genero el usuario básico para otro usuario.
            if(null != $request->input('user_departamento_ci')){

                $user =  User::select('users.id')->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.ci' , '=' , $request->input('user_departamento_ci') )
                ->get();

                //Notificamos al usurio que los datos son <incorrectos class="">
                $user_id = (count($user) > 0 ) ? $user[0]->id : Auth::user()->id;

                $go_to_home = true;

            }else{

                $user_id = Auth::user()->id;
            }
       
            $codigo = _generarCodigo(4);//codigo aleatorio del incidente

            //creamos el incidente en la BD   
            $incidencia = Incidencia::create([
                "codigo" => $codigo,
                "detalle" => $request->input('detalle'), 	
                "fecha" => $fecha,
                "hora" => $hora,
                "estado_id" => 3,
                "user_id" => $user_id,
                "motivo_id" => $request->input('motivo_id')
            ]);

            if($incidencia->save()){
                if ( $go_to_home ){
                    flash('Incidente reportado')->success();
                    return response()->json($incidencia);
                }else{
                    flash('Incidente reportado')->success();
                    return response()->json($incidencia);
                } 
            }

    }


    public function postAsignar(Request $request)
    {
        $date = new Carbon();

        $fecha_asignada =  $date->format('Y-m-d');


        //sacamos el nombre del tecnico asignado a la incidencia
        $tec = User::find($request->input('asignado'));
        
        $tecnico = ucfirst($tec->persona->p_nombre) . ' ' . ucfirst($tec->persona->s_nombre);

        
        //actulizamos la incidencia
        $incidencia = Incidencia::find($request->input('incidencia_id'));

        $incidencia->asignada = true; 

        $incidencia->fecha_asignada = $fecha_asignada;
           
        $incidencia->user_id_asignado = $request->input('asignado');
      
        $incidencia->save();

        
        //se puede enviar un notificación al usuario creador del incidente cuando se le asigne un técnico
      
        \DB::table('notificacions')->insert(
            [
                array(
                    'notificacion' => 'Se le asigno el técnico ' . $tecnico . ' al incidente código ' . $incidencia->codigo . '',
                    "user_id" =>  $incidencia->user_id //usuario
                ),
                array(
                    'notificacion' => 'Se le asigno al incidente código ' . $incidencia->codigo . '',
                    "user_id" => $request->input('asignado') //tecnico
                )
            ]
        );
       

        //hay que validar para el redirect por user

        //return redirect('/incidencia/show/'.$request->input('incidencia_id') );
        //return redirect('/home');
        return response()->json($incidencia);

    }


    public function postObservacion(Request $request)
    {
        
        $observacion = Observacion::create([
            'observacion' => $request->input('observacion'),
            'incidencia_id' => $request->input('incidencia_id'),
            "user_id" => Auth::user()->id
        ]);

        $observacion->save();

        flash('Observación enviada!')->success();

        return redirect()->back();
        ///return redirect('/incidencia/show/'.$request->input('incidencia_id') );

    }


    public function postIncidenciaEstadoUpdate(Request $request){

        $incidencia = Incidencia::find($request->input('incidencia_id'));

        $incidencia->estado_id = $request->input('estado_id'); 

        $incidencia->nota = $request->input('nota'); 
     
        $incidencia->save();

        $notificacion = Notificacion::create([
            'notificacion' => 'Se ha actualizado el estado del incidente.',
            "user_id" =>  $incidencia->user_id
        ]);

        $notificacion->save();

        flash('El estdo del incidente actualizado!')->success();

        return redirect('/incidencia/show/'.$request->input('incidencia_id') );
        
    }
}


/*

  $notificacion = Notificacion::create([
            'notificacion' => 'Se le asigno el técnico : al incidente código ' . $incidencia->codigo . '',
            "user_id" =>  $incidencia->user_id //usuario
        ],
        [
            'notificacion' => 'Se le asigno al incidente código ' . $incidencia->codigo . '',
            "user_id" => $request->input('asignado') //tecnico
        ]);

        $notificacion->save();


*/