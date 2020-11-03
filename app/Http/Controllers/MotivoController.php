<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//validaciones
use App\Http\Requests\MotivoRequest;

use App\Http\Requests;

use Auth;

use App\Motivo;


class MotivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
   
    
    public function store(MotivoRequest $request)
    {
        

        $motivo = new Motivo();

        $motivo->nombre = $request->input('motivo');

        $motivo->categoria_id = $request->input('categoria_id');

        $motivo->save();

        if($motivo){

          // $mjs = 'registro el departamento ' . $request->input('nombre');

           //push_historial(Auth::user()->id, $mjs);

          flash('DATOS GUARDADOS.')->success();

            return redirect('/configuracion/generales');
        }

    }

  
    public function update(MotivoRequest $request, $id)
    {
   
        $motivo = Motivo::find($id);

        $motivo->update([
            'nombre' => $request->input('motivo'),
            'categori_id' => $request->input('categoria_id')
        ]);

        //$mjs = 'actualizo  el divisio$division ' . $departamento->nombre  . ' por ' . $request->input('nombre') . ' y el status  ' . $status;

        //push_historial(Auth::user()->id, $mjs);

        flash('DATOS ACTUALIZADOS')->success();
      
        return redirect('/configuracion/generales');
    }
}
