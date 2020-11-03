<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $fillable = [
        'nombre', 'categoria_id' 
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function incidencias()
    {
    	return $this->hasMany(Incidencia::class);
    }
}
