<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;


class UsuarioPasswordUpdate extends Controller
{
    public function show($id){
        $usuario =  User::find($id);

        return view('usuario.password_update' , compact('usuario'));
    }


    public function update(Request $request, $id)
    {
        
        $usuario = User::find($id);


        //dd($usuario);
        
        $v = \Validator::make($request->all(), [

            'password' => 'required|confirmed|min:4|max:8'
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $usuario->password = bcrypt($request->password);

        if($usuario->save()){

            flash('Su contraseña ha sido actualizada correctamente!')->success();
      
            return redirect('/cuenta');
        }

         
    }
}
