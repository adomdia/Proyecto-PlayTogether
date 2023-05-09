<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;


    protected $table = 'comentarios_publicaciones';

    protected $fillable = ['id_user', 'id_publicacion', 'texto', 'user_name'];

    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function publicacion()
    {
        return $this->hasMany(Publicaciones::class, 'id');
    }

}
