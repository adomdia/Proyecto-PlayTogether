<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Chat extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'chat';

    protected $fillable = ['user_1', 'user_2'];
}
