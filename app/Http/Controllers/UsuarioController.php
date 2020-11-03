<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Persona;

use App\Departamento;

use App\Http\Requests\UsuarioRequest;

use App\Http\Requests\UsuarioUpdateRequest;


use App\helpers;

use Auth;


class UsuarioController extends Controller
{
   
   
   
    public function __construct()
    {
        //$this->middleware('admin')->except(['getCuentaUserLogin']);
        $this->middleware('auth');
    }

    public function index()
    {
        $socioTitle = "Módulo de Usuarios";

        $usuarios = User::all();

        $departamentos = Departamento::pluck('nombre','id'); //alias unidades administrativas

        $categorias =  \DB::table('categorias')->pluck('nombre' , 'id'); //alias divisiones

      
       return view('usuario.index', compact('socioTitle', 'usuarios','departamentos','categorias'));
    }

    
    public function create()
    {
        $socioTitle = "Módulo de Usuarios";

        $departamentos = Departamento::pluck('nombre','id'); //alias unidades administrativas

        $categorias =  \DB::table('categorias')->pluck('nombre' , 'id'); //alias divisiones

       return view('usuario.create', compact('socioTitle', 'departamentos','categorias'));
    }


    public function store(UsuarioRequest $request)
    {
        
        //validación del número de usuario permitido por departamento
        /*
        $udpermitidos = Departamento::select('num_user')->where('id','=',$request->input('departamento_id'))->get();

        $totaluserdep = Departamento::where('id','=',$request->input('departamento_id'))->count('num_user');

        if(( $totaluserdep + 1) > $udpermitidos[0]->num_user){

            flash('error')->error();
            return redirect('/usuarios');  
        }
        */
        
        //separacion de nombres y apellidos del usuario
        
        $nombres = explode(" ", $request->input('p_nombre'));

        $apellidos = explode(" ", $request->input('p_apellido'));

        $sn = ( is_iterable($nombres) > 1 ) ? $nombres[1] : null;

        $sap = ( is_iterable($apellidos) > 1 ) ? $apellidos[1] : null;

        $persona = Persona::create([
            'ci' => $request->input('ci'),
            'p_nombre' => $nombres[0],
            's_nombre' => $sn,
            'p_apellido' => $apellidos[0],
            's_apellido' => $sap,
            'fecha_n' => $request->input('fecha_n'),
            'sexo' => $request->input('sexo'),
            'correo' => $request->input('correo')
        ]);


        if(!$persona){ 

            flash('ERROR EN EL REGISTRO')->error();
            
            return redirect('/usuarios');
        }

        $usuario = User::create([
                'usuario' => $request->input('ci'),
                'password' => bcrypt($request->input('ci')),
                'tipo' => $request->input('tipo'),
                'persona_id' => $persona->id,
                'departamento_id' => $request->input('departamento_id'),
                'categoria_id' => $request->input('categoria_id'),
                'status' => true
        ]);

        if(!$usuario){

            $persona->delete();

            flash('ERROR EN EL REGISTRO')->error();
            
            return redirect('/usuarios');
        }

        flash('Nuevo usuario registrado con exito en el sistema!')->success();
            
        return redirect('/usuarios');
        
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        $usuario= User::findOrFail($id);

        $departamentos = Departamento::pluck('nombre','id'); //alias unidades administrativas

        $categorias =  \DB::table('categorias')->pluck('nombre' , 'id'); //alias divisiones


        return view('usuario.edit' , compact('usuario','departamentos','categorias'));
    }

    
    public function update(UsuarioUpdateRequest $request, $id)
    {
        
        $url = '/usuarios/' . $id . '/edit';
      
           
        $usuario = User::find($id);

        //dd($usuario);

        $usuario->update($request->all());

        if(isset($request->redirect)){
           flash('Datos del usuario actualizados con exito!.')->success();
      
            return redirect('/cuenta');
        }

       flash('Datos del usuario actualizados con exito!.')->success();
      
        return redirect($url); 
    }


    public function postAcivarUsuario($id)
    {
    
        
        $usuario = User::find($id);

        if($usuario->status == 1){

            $usuario->status = 0;

            $usuario->save();

            flash('Usuario Bloqueado')->success();
      
            return redirect('/usuarios');

        }else{

            $usuario->status = 1;

            $usuario->save();

            flash('Usuario Activado')->success();
      
            return redirect('/usuarios');

        }
    }

//initcap() 
    public function getCuentaUserLogin()
    {

        $usuarioTitle = "Módulo de Usuarios";

        $usuario = User::find(Auth::user()->id);

        $persona = $usuario->persona;

        $departamentos = Departamento::pluck('nombre','id');

        $otic_departamentos =  \DB::table('categorias')->pluck('nombre' , 'id');

        return view('usuario.cuenta', compact('usuarioTitle', 'usuario', 'persona','departamentos'));
    }


    public function getResetPasswordToCiUser($id){
        
    
        $usuario = User::find($id);

        $ci = $usuario->persona->ci;
       
        $usuario->password = bcrypt($ci);

        if($usuario->save()){
            flash('La contraseña ha sido actualizada correctamente!')->success();

            return redirect('/usuarios');
        }
    }
}
