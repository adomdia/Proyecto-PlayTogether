<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosComprados extends Model
{
    use HasFactory;

    protected $table = 'cursos_comprados';

    protected $fillable = ['titulo', 'id_user', 'nombre_user', 'descripcion', 'user_compra', 'foto', 'id_curso'];

}
