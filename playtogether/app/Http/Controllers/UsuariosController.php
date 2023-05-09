<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index(){

        $usuarios = User::all();
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        return view('usuarios', compact('user', 'usuarios'));
    }
}
