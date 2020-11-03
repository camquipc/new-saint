<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre',
        'status',
        'num_usuario_permitido'
    ];

    public function usuarios()
    {
    	return $this->hasMany(User::class);
    }


}
