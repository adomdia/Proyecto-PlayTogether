<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeChat extends Model
{
    use HasFactory;

    protected $table = 'chat_mensaje';

    protected $fillable = ['user_send', 'user_recive', 'user_send_name', 'user_send_foto', 'text'];
}
