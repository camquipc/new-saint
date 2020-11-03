<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = "observaciones";

    protected $fillable = [
        'observacion',
        'incidencia_id',
        'user_id'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
