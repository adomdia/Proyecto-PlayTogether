<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;

    protected $table = 'solicitud_amistad';

    protected $fillable = ['user_1', 'user_2', 'nombre_user_1', 'nombre_user_2'];

    // public function scopeBuscarpor($query, $tipo, $buscar) {
    //     if ( ($tipo) && ($buscar) ) {
    //         return $query->where($user, 'like', "%$buscar");
    //     }
    // }
}
