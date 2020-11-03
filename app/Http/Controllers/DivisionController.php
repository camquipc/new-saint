<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//validaciones
use App\Http\Requests\DivisionRequest;

use Auth;

use App\Categoria;


class DivisionController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
   
    
    public function store(DivisionRequest $request)
    {
        

        $division = new Categoria();

        $division->nombre = $request->input('nombre');

        $division->status = $request->input('status');

        $division->save();


        if($division){

          // $mjs = 'registro el departamento ' . $request->input('nombre');

           //push_historial(Auth::user()->id, $mjs);

          flash('DATOS GUARDADOS.')->success()->important();

            return redirect('/configuracion/generales');
        }

    }

  
    public function update(DivisionRequest $request, $id)
    {
   
    
        $division = Categoria::find($id);

        $status = ($request->input('status') == 1) ? ' activo ' : ' suspendido ';

        $division->update([
            'nombre' => $request->input('nombre'),

            'status' => $request->input('status'),
    
        ]);


        //$mjs = 'actualizo  el divisio$division ' . $departamento->nombre  . ' por ' . $request->input('nombre') . ' y el status  ' . $status;

        //push_historial(Auth::user()->id, $mjs);

        flash('DATOS ACTUALIZADOS')->success();
      
        return redirect('/configuracion/generales');
    }

}
