<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'codigo','detalle', 'fecha', 'hora', 'estado_id', 'user_id','motivo_id','asignada'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motivo()
    {
        return $this->belongsTo(Motivo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }


    public function user_asignado()
    {
        return $this->belongsTo(User::class, 'user_id_asignado' , 'id');
    }


    //scope de busqueda

   

    public function scopeF($query , $desde , $hasta)
    {
        return $query->whereBetween('fecha', [$desde, $hasta]);
    }

   

}
