<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Amistad extends Model
{
    use HasFactory;
    protected $table = 'amistad';

    protected $fillable = ['user_1', 'user_2', 'nombre_user_1', 'nombre_user_2'];

    public function scopeBuscarpor($query, $buscar) {
        if ( ($buscar) ) {
            return $query->where($user, 'like', "%$buscar");
        }
    }

    public function user(): BelongsTo
    {
        return $this->hasMany(User::class, 'id');
    }
}
