<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class CrearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();


        return view('crear', compact('user'));
    }
}
