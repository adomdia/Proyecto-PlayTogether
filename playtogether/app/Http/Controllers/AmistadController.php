<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Amistad;
use App\Models\User;


class AmistadController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $amigos = Amistad::get()->where('user_1', $id);
        $usuarios = User::all();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $cAmigos = User::get()->whereIn('id', $amistad)->count();





        return view('amigos', compact('amigos', 'user', 'usuarios', 'cAmigos'));
    }

    public function store(Request $request)
    {



        $request->validate([
            'user_1' => 'required',
            'user_2' => 'required',
            ] );


        Amistad::create(['user_1' => $request->user_1,
                        'user_2' => $request->user_2,
                        'nombre_user_1' => $request->nombre_user_1,
                        'nombre_user_2' => $request->nombre_user_1,]);


        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return view('home', compact('user'));
    }


    public function eliminar(Request $request){
        $id_user_1 =  auth()->user()->id;
        $id_user_2 = $request->usuario_id;

        $id_amistad_1 = Amistad::get()->where('user_2', $id_user_2)->where('user_1', $id_user_1)->value('id');
        $id_amistad_2 = Amistad::get()->where('user_2', $id_user_1)->where('user_1', $id_user_2)->value('id');

        Amistad::destroy($id_amistad_1);
        Amistad::destroy($id_amistad_2);

        $id = auth()->user()->id;
        $amigos = Amistad::get()->where('user_1', $id);
        $usuarios = User::all();
        $user = User::get()->where('id', $id)->first();

        return view('amigos', compact('amigos', 'user', 'usuarios'));

    }
}
