<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Publicaciones;


class ConfigController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();
        $publicaciones = Publicaciones::get()->where('id_user', $id);

        return view('config', compact('user', 'publicaciones'));

    }
}
