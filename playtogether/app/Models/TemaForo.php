<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaForo extends Model
{
    use HasFactory;

    protected $table = 'temas_foro';

    protected $fillable = ['titulo'];
}
