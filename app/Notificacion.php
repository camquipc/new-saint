<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
        'notificacion',
        'user_id'
    ];
}
