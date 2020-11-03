<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'ci' ,
        'p_nombre',
        's_nombre' ,
        'p_apellido',
        's_apellido',
        'fecha_n',
        'sexo',
        'correo'
    ];


    public function usuario()
    {
        return $this->hasOne('App\User');
    }


    
}
