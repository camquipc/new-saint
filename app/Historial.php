<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = [
        'ip',
        'user_id',
        'fecha',
        'operacion',
        'so' 
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
