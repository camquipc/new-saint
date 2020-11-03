<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequests;

use App\User;

use Auth;

use App\helpers;

use App\Sistema;



class LoginController extends Controller
{
    //CARGA EL FORMULARIO DE INCIO DE SESSION
    public function index()
    {
        $developers = \DB::table('desarrolladores')->select('desarrolladores.*')->get();

        return view('auth.login', compact('developers'));
    }


    //VERIFICA EL USUARIO Y CREA LA SESSION DEL USUARIO NUEVO
    public function store(Request $request){

        // verificando el usuario que exista
        $usuario = User::where('usuario', '=' , $request->usuario )->get();

        if( !is_iterable($usuario) > 0  ){

           flash('El usuario no existe!')->error();
            return \Redirect::to('/');
        }
        //VALIDAR SI EXISTE EL USUARIO PENDIENTE POR HACER...

        if($usuario[0]->status === 2 ) {
            
           flash('Este usuario se encuentra suspendido!')->error();
            return \Redirect::to('/');
        }
/*

        if($usuario[0]->token_session != null ) {
            
            flash('USUARIO CON SESSION ACTIVA!')->error()->important();
            return \Redirect::to('/');
        }
*/

    	if(Auth::attempt(['usuario' => $request->usuario , 'password' => $request->password])){
            

            $usuario2 = User::find(Auth::user()->id);
            //$usuario2->token_session = md5(Auth::user()->id);

            $usuario2->save();

            //cargado el historial del usuario
            push_historial($usuario[0]->id, 'Inicio de Sesion');
            //iniciamos la session del usuario
    		return \Redirect::to('home');

    	}else{

           flash('El usuario o la contraseña son incorrecta!')->error();
           return \Redirect::to('/');
        }
    }


    //CERRAR LA SESSION DEL USUARIO
    public function salir(){

        //$usuario = User::find(Auth::user()->id);

        //$usuario->token_session = '';

        //$usuario->save();

        \Session::flush(Auth::user()->id);
        push_historial(Auth::user()->id, 'Cerro de Sesion');
        Auth::logout();
    	
        return \Redirect::to('/');
    	
    }


}
