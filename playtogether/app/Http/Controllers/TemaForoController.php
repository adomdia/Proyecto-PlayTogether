<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TemaForo;

use App\Models\User;

use App\Models\ComentarioTema;


class TemaForoController extends Controller
{
    public function index(){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        $temas = TemaForo::all();

        dd($temas);

        return view('foro', compact('user', 'temas'));
    }


    public function store(Request $request){
    $request->validate([
        'titulo' => 'required | max: 500',
        ] );


    TemaForo::create([
        'titulo' => $request->titulo,
                    ]);
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        $temas = TemaForo::all();

        return view('foro', compact('user', 'temas'));

    }

    public function destroy(Request $request)
    {
        $id = $request->id;


        TemaForo::destroy($id);

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        $temas = TemaForo::all();

        return view('foro', compact('user', 'temas'));
}

    public function show($id){
        $comentarios = ComentarioTema::orderBy('valoracion', 'DESC')->get()->where('tema_id', $id);
        $tema = TemaForo::get()->where('id', $id)->first();

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        return view('temaforo', compact('user', 'comentarios', 'tema'));
    }
}
