<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ci' => 'required|min:7|max:9|unique:personas',
            'usuario' => 'required|unique:users|min:7|max:9',
            'p_nombre' => 'required|string|min:4|max:20',
            'p_apellido' => 'required|string|min:4|max:20',
            'fecha_n' => 'required',
            'password' => 'required|min:4|max:8',
            'tipo' => 'required|in:1,2,3,4',
            'departamento_id' => 'required',
            'categoria_id' => 'required'
        ];

        
    }

    
      public function messages()
      {
            return [
                'ci.required' => 'La cédula es requerida.',
                'ci.min' => 'La cédula debe ser mayor a 7 números.',
                'ci.max' => 'La cédula no debe ser mayor a 9 números.',
                'ci.unique' =>'La cédula ya esta en uso.',
                'fecha_n.required' =>'La fecha de nacimiento es requerida.',
                'p_nombre.required' => 'El nombre es requerido',
                'p_apellido.required' => 'El apellido es requerido',
                'p_nombre.min' => 'El nombre debe ser mayor a 4 caracteres',
                'p_apellido.min' => 'El apellido debe ser mayor a 4 caracteres',
                'p_nombre.max' => 'El nombre no debe ser mayor a 20 caracteres',
                'p_apellido.max' => 'El apellido no debe ser mayor a 20 caracteres',
                'tipo.required' => 'El tipo de usuario es requerido.',
                'tipo.in' => 'El tipo de usuario no es valido.',
                'departamento_id.required' => 'El departamento es requerido.',
                'categoria_id.required' => 'La categoria es requerida.',
                'usuario.required' => 'El usuario es requerido.',
                'usuario.max' => 'El usuario no debe ser mayor a 9 caracteres',
                'usuario.min' => 'El usuario no debe ser menor a 7 caracteres',
                'usuario.unique' =>'El usuario ya esta en uso',
                'password.required' => 'La contraseña es requerida',
            ];
      }
    
}
