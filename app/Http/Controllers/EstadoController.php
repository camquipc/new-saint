<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Estado;

//validaciones
use App\Http\Requests\EstadoRequest;

use Auth;



class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
   
    
    public function store(EstadoRequest $request)
    {
        

        $estado = new Estado();

        $estado->estado = $request->input('estado');

        $estado->save();

        if($estado){

          // $mjs = 'registro el departamento ' . $request->input('nombre');

           //push_historial(Auth::user()->id, $mjs);

          flash('DATOS GUARDADOS.')->success();

            return redirect('/configuracion/generales');
        }

    }

  
    public function update(EstadoRequest $request, $id)
    {
   
        $estado = Estado::find($id);

       // $status = ($request->input('status') == 1) ? ' activo ' : ' suspendido ';

        $estado->update([
            'estado' => $request->input('estado')
        ]);

        //$mjs = 'actualizo  el divisio$division ' . $departamento->nombre  . ' por ' . $request->input('nombre') . ' y el status  ' . $status;

        //push_historial(Auth::user()->id, $mjs);

        flash('DATOS ACTUALIZADOS')->success();
      
        return redirect('/configuracion/generales');
    }
}
