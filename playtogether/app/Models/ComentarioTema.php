<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioTema extends Model
{
    use HasFactory;


    protected $table = 'comentarios_temas_foro';

    protected $fillable = ['user_id', 'user_name', 'tema_id', 'comentario', 'valoracion' ];

}
