<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $filable = ['título', 'descripcion', 'foto', 'user', 'valoración', 'tipo'];

    public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
            return $query->where($user, 'like', "%$buscar");
        }
    }
}
