<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaUpdateRequest extends Request
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
            'ci' => 'required|min:7|max:9|',
            'p_nombre' => 'required|string|min:4|max:25',
            'p_apellido' => 'required|string|min:4|max:25',
            'fecha_n' => 'required'
        ];

        
    }

    
      public function messages()
      {
            return [
                'ci.required' => 'La cedula es requerida.',
                'fecha_n.required' =>'La fecha de nacimiento es requerida',
                'p_nombre.required' => 'El nombre es requerido',
                'p_apellido.required' => 'El apellido es requerido',
            ];
      }
}
