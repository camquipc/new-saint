<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

use Carbon\Carbon;

class HistorialUsuarioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    
    
    
    public function gethistorial()
    {
        $users = User::all();

        $query = "http://localhost:8000/pdf/historial/null/null/null";

        $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->orderBy('historials.id', 'DESC')
                ->get();


        return view('configuracion.historial.index', compact('historials','users','query'));
    }

    public function postHistorialFilterForDate(Request $request)
    {
        $users = User::all();

        if(empty($request->desde) && empty($request->hasta) && empty($request->user)){
            
            $query = "http://localhost:8000/pdf/historial/null/null/null";

            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->orderBy('historials.id', 'DESC')
                ->get();

         // flash('Debe enviar las fechas desde y hasta para mejorar la busqueda!')->error();
          return view('configuracion.historial.index', compact('historials','users' , 'query'));
        }

        if(!empty($request->user) && empty($request->desde) && empty($request->hasta)){
            
            //$query = ['desde' => '' , 'hasta' => '', 'user' => $request->user];
            $query = "http://localhost:8000/pdf/historial/null/null/".$request->user;

            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->where('users.id', $request->user)
                ->orderBy('historials.id', 'DESC')
                ->get();

          return view('configuracion.historial.index', compact('historials','users' , 'query'));
        }

        if(!empty($request->desde) && !empty($request->hasta) && empty($request->user) ){
            
            //$query = ['desde' => $request->desde  , 'hasta' => $request->hasta, 'user' => ''];
            $query = "http://localhost:8000/pdf/historial/".$request->desde . "/" . $request->hasta ."/null";
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->whereBetween('fecha', [$request->desde, $request->hasta])
                ->orderBy('historials.id', 'DESC')
                ->get();

          return view('configuracion.historial.index', compact('historials','users' , 'query'));
        }
        
        if(!empty($request->desde) && !empty($request->hasta) && !empty($request->user)){
            //filtrar por fechas desde hasta
            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->whereBetween('fecha', [$request->desde, $request->hasta])
                ->where('users.id', $request->user)
                ->orderBy('historials.id', 'DESC')
                ->get();
            
            $query = "http://localhost:8000/pdf/historial/".$request->desde . "/" . $request->hasta ."/" . $request->user . "";
            //$query = ['desde' => $request->desde  , 'hasta' => $request->hasta, 'user' => $request->user];
            return view('configuracion.historial.index', compact('historials','users' , 'query'));
        }
        
    }


    public function postHistorialAjax(Request $request)
    {
        
        if($request->input('hoy') == 1 ){

            $date = new Carbon();

            $fecha = $date->format('Y-m-d');

            if($request->input('usuario') == 'todos'){

                $historials = \DB::table('historials')
                    ->join('users', 'users.id', '=', 'historials.user_id')
                    ->select('historials.*','users.*')
                    ->where('fecha', $fecha)
                    ->orderBy('historials.id', 'DESC')
                    ->get();
            }

            else{

                $historials = \DB::table('historials')
                    ->join('users', 'users.id', '=', 'historials.user_id')
                    ->select('historials.*','users.*')
                    ->where('users.usuario', $request->input('usuario'))
                    ->where('fecha', $fecha)
                    ->orderBy('historials.id', 'DESC')
                    ->get();
            }


            $usuario = $request->input('usuario');
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');
            $hoy = $request->input('hoy');


            $users = User::all();


            return view('configuracion.historial.index', compact('historials','users','usuario','desde','hasta','hoy'));

        }

        if($request->input('usuario') == 'todos'){

            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->whereBetween('fecha', [$request->input('desde'), $request->input('hasta')])
                ->orderBy('historials.id', 'DESC')
                ->get();

            $usuario = $request->input('usuario');
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');
            $hoy = $request->input('hoy');

            $users = User::all();


            return view('configuracion.historial.index', compact('historials','users','usuario','desde','hasta','hoy'));


        }else{

            $historials = \DB::table('historials')
                ->join('users', 'users.id', '=', 'historials.user_id')
                ->select('historials.*','users.*')
                ->where('users.usuario', $request->input('usuario'))
                ->whereBetween('fecha', [$request->input('desde'), $request->input('hasta')])
                ->orderBy('historials.id', 'DESC')
                ->get();

            $usuario = $request->input('usuario');
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');
            $hoy = $request->input('hoy');


            $users = User::all();


            return view('configuracion.historial.index', compact('historials','users','usuario','desde','hasta','hoy'));

        }

        
    }
}
