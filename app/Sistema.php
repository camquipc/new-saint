<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = [
        'sistema_nombre',
        'sistema_detalle',
        'sistema_version',
        'logo'
    ];
}
