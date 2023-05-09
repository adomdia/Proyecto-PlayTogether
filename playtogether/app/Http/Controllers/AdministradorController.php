<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdministradorController extends Controller
{
    public function index(){

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        if ($user->email != "admin@admin.com"){
            return view('/');
        }
        $usuarios = User::all();



        return view('administrador.index', compact('user', 'usuarios'));

    }
}
