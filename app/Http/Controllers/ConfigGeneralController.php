<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Sistema;


use App\Historial;

use App\User;

use Auth;

use Carbon\Carbon;
use App\Incidencia;
use App\Departamento;

use App\Estado;

use App\Categoria;

use App\Motivo;

class ConfigGeneralController extends Controller
{
   

   public function __construct()
    {
        //$this->middleware('admin')->except(['index','ayuda']);
        $this->middleware('auth');
    }

    public function index()
    {

        $departamentos = Departamento::all() ;

        $sistema = Sistema::all()[0];

        $historials = Historial::all();

        $users = User::where('tipo','<>' , 5)->get();


        //dd($users);
        
        $otic_departamentos = Categoria::all();

        $motivos = Motivo::all();

        $estados = \DB::table('estados')
                ->select('*')
                ->get();

        $directivo = \DB::table('generales')
                ->select('nombre','apellido','id')
                ->get();


        return view('configuracion.index', 
        compact('departamentos', 'sistema','historials','users','otic_departamentos','motivos','estados','directivo'));
    }

    public function store_directiva(Request $request)
    {

        //validacion que sea un socio
        $socio = \DB::table('personas')
            ->join('socios', 'personas.id', '=', 'socios.persona_id')
            ->select('socios.id')
            ->where('ci', $request->input('cedula'))
            ->where('socios.status', true)
            ->get();

        //dd($socio);

        if (is_iterable($socio) > 0) {

            $directivo = new Directivo;

            $directivo->cargo = $request->input('cargo');

            $directivo->periodo = $request->input('periodo');

            $directivo->socio_id = $socio[0]->id;

            $directivo->status = true;

            if ($directivo->save()) {

                return redirect('generales');
            }
        }else{

            return redirect('generales');
        }

    }

    public function store_update_sistema(Request $request)
    {
        
        $sistem = Sistema::findOrFail($request->input('id'));

        $sistem->update([        
            'sistema_nombre'     => $request->input('sistema_nombre'),
            'sistema_detalle'   => $request->input('sistema_detalle')                    
        ]);

        $file = $request->file('logo');

        if (!empty($file)) {

            $file->move('Files', $file->getClientOriginalName());

            $sistem->fill(['logo' => $request->file('logo')->getClientOriginalName()])->save();

        }

        flash('DATOS ACTUALIZADO')->success();

        return redirect('configuracion/generales');
    }



    public function ayuda()
    {
        return view('configuracion.ayuda.index');
    }


    public function desarrolladores()
    {

        $desarrolladores = \DB::table('desarrolladores')->select('desarrolladores.*')->get();

        

        return view('configuracion.desarrolladores.index', compact('desarrolladores'));
    }

    public function reportes()
    {
        $incidencias = [];

        $newDirectorSAIT =  \DB::table('generales')
        ->select('nombre','apellido')->get();
        
        return view('reportes.index', compact('incidencias','newDirectorSAIT'));
    
    }


    public function directiva(Request $request)
    {
        
        $user = User::where('id', '=', $request->input('user_id'))->get();

        //dd($user[0]);
        
        $newDirectorSAIT =  \DB::table('generales')
        ->where('id', 1)
        ->update(
            [
                'nombre' => $user[0]->persona->p_nombre,
                'apellido'      => $user[0]->persona->p_apellido,
            ]
        );

        flash('Datos actualizados')->success();

        return redirect('configuracion/generales');
    
    }


    public function getInformeTecnico(Request $request)
    {
        //dd($request->all());
        
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
        //return response()->json($incidencias);
        return view('reportes.soporteTecnicoPdf', compact('incidencias'));
    }

    
}

/*
 
  Charts::scripts() 
 //chart2->script() 
 */
