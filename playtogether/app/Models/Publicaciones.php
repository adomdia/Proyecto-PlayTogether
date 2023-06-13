<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = ['titulo', 'descripcion', 'id_user', 'archivo', 'tipo', 'nombre_user'];

    public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
            return $query->where($user, 'like', "%$buscar");
        }
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }

}
