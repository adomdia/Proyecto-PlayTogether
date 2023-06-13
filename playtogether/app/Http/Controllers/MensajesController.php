<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Amistad;
use App\Models\User;

class MensajesController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $amigos = Amistad::get()->where('user_1', $id);
        $usuarios = User::all();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $cAmigos = User::get()->whereIn('id', $amistad)->count();
        $todos = User::all();





        return view('mensaje', compact('amigos', 'user', 'usuarios', 'cAmigos', 'todos'));
    }

}
