<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ContenidoController extends Controller
{
    public function index(){
        $user = auth()->user();


        return view('contenido', compact('user'));
    }
}
