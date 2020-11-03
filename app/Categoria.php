<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{


    protected $fillable = [
        'nombre',
        'status',
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function motivos()
    {
    	return $this->hasMany(Motivo::class);
    }
}
