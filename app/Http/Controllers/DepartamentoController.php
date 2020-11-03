<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Departamento;

//validaciones
use App\Http\Requests\DepartamentoRequest;

use Auth;

use Admin;

use App\helpers;

use App\User;


class DepartamentoController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
   
    
    public function store(DepartamentoRequest $request)
    {
        

        $departamento = new Departamento();

        $departamento->nombre = $request->input('nombre');

        $departamento->status = $request->input('status');

        $departamento->num_usuario_permitido = $request->input('num_usuario_permitido');

        $departamento->save();


        if($departamento){

          // $mjs = 'registro el departamento ' . $request->input('nombre');

           //push_historial(Auth::user()->id, $mjs);

          flash('DATOS GUARDADOS.')->success()->important();

            return redirect('/generales');
        }

    }

  
    public function update(DepartamentoRequest $request, $id)
    {
   
        $departamento = Departamento::find($id);

        $num_usuario_departamento = User::where('departamento_id', '=' , $departamento->id)->count();

        ///dd($num_usuario_departamento);
        //HACER UNA VALIDACION DE LOS USUARIO AGREGADOS A ESTE 
        //DEPARTAMENTO ANTES DE ACUTUALIZAR EL NUMERO DE USUARIO PERMITIDOS...   
        if($num_usuario_departamento < $request->input('num_usuario_permitido')){
           
            flash('NO SE PUEDE REALIZAR ESTA ACCIÓN')->error();

            //$mjs = 'actualizo  el departamento ' . $departamento->nombre  . ' por ' . $request->input('nombre') . ' y el status  ' . $status;

            //push_historial(Auth::user()->id, $mjs);
      
            return redirect('configuracion/generales');
        }

        $status = ($request->input('status') == 1)? ' activo ' : ' suspendido ';

    
        $departamento->update([
            'nombre' => $request->input('nombre'),

            'status' => $request->input('status'),
    
            'num_usuario_permitido' => $request->input('num_usuario_permitido')
        ]);


        //$mjs = 'actualizo  el departamento ' . $departamento->nombre  . ' por ' . $request->input('nombre') . ' y el status  ' . $status;

        //push_historial(Auth::user()->id, $mjs);

        flash('DATOS ACTUALIZADOS')->success();
      
        return redirect('configuracion/generales');
    }

}
