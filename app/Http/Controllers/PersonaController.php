<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PersonaUpdateRequest;


use App\Http\Requests;

use App\Persona;

use App\User;

class PersonaController extends Controller
{
    

    public function __construct()
    {
        //$this->middleware('admin');
        $this->middleware('auth');
    }

    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        //return Response::json($persona->toArray(),200);
        //if($request->ajax()){

            
            $notificaciones = $persona = Persona::where('ci', $id)->get();

            return Response()->json($notificaciones[0]);
        //}
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaUpdateRequest $request, $id)
    {
        
      
            $persona = Persona::find($id);

            $url = '/usuarios/' . $id . '/edit';
    
            $persona->update($request->all());


            //ACTULIZAMOS EL NOMBRE DE USUARIO Y EL PASSWORD SI EL CI LO MODIFICAN...
            $usuario = User::find($id);

            $ci = $persona->ci; //la cedula actualiza o la nueva cedula

            $usuario->usuario = $ci;

            $usuario->password = bcrypt($ci);

            $vali = $usuario->save();


            //validar error

            if(!$vali){
                if(null !== $request->input('perfil')){

                    flash('No se pudo actualizar su información personal!')->error();
              
                    return redirect('/cuenta');
    
                }else{
    
                    flash('No se pudo actualizar su información personal!')->error();
              
                    return redirect($url);
    
                }
            } else {

                if(null !== $request->input('perfil')){

                    flash('Información personal ha sido actualizada correctamente!')->success();
              
                    return redirect('/cuenta');
    
                }else{
    
                    flash('Información personal ha sido actualizada correctamente!')->success();
              
                    return redirect($url);
    
                }
            }

    
            
  
    }

    
    public function destroy($id)
    {
        //
    }

    




}
