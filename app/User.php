<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'usuario', 'password', 'tipo', 'status', 'persona_id', 'departamento_id','categoria_id'
    ];


    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function incidencias()
    {
    	return $this->hasMany(Incidencia::class);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

   

    
}
