<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitudes;
use App\Models\Amistad;
use App\Models\Publicaciones;

class SolicitudAmistadController extends Controller
{
    public function create()
    {
        //
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $request->validate([
            'user_1' => 'required',
            'user_2' => 'required',
            ] );


        Solicitudes::create(['user_1' => $request->user_1,
        'user_2' => $request->user_2,
        'nombre_user_1' => $request->nombre_user_1,
        'nombre_user_2' => $request->nombre_user_2,]);


        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $publicaciones = Publicaciones::whereIn('id_user', $amistad)->get();
        $amigos = User::get()->whereIn('id', $amistad);
        $cAmigos = User::get()->whereIn('id', $amistad)->count();


        return view('home', compact('user', 'amigos', 'cAmigos', 'publicaciones'));
        }

    public function aceptar(Request $request){


        Amistad::create(['user_1' => $request->user_1,
        'user_2' => $request->user_2,
        'nombre_user_1' => $request->nombre_user_1,
        'nombre_user_2' => $request->nombre_user_2,]);

        Amistad::create(['user_1' => $request->user_2,
        'user_2' => $request->user_1,
        'nombre_user_1' => $request->nombre_user_2,
        'nombre_user_2' => $request->nombre_user_1,]);


        $id = $request->solicitud_id;
        Solicitudes::destroy($id);

        $id = auth()->id();
        $solicitudes = Solicitudes::get()->where('user_2', $id);
        $usuarios = User::all();
        $user = User::get()->where('id', $id)->first();
        return view('usuarios', compact('user', 'usuarios', 'solicitudes'));
    }

    public function rechazar(Request $request){
        $id = $request->solicitud_id;
        Solicitudes::destroy($id);
    }
}
