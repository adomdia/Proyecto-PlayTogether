<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = ['titulo', 'id_user', 'nombre_user', 'descripcion', 'texto', 'precio', 'foto', 'video'];

}
