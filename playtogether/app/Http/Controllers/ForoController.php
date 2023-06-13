<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\TemaForo;



class ForoController extends Controller
{
    public function index(){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        $temas = TemaForo::all();

        return view('foro', compact('user', 'temas'));
    }
}
