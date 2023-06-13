<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TemaForo;

use App\Models\ComentarioTema;

use Illuminate\Http\Request;

class ComentarioTemaController extends Controller
{
    public function destroy(Request $request)
    {
        $id = $request->id;

        $comentario = ComentarioTema::get()->where('id', $id)->first();


        $tema = TemaForo::get()->where('id', $request->tema_id)->first();

        ComentarioTema::destroy($id);


        $comentarios = ComentarioTema::get()->where('tema_id', $tema->id);

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();
    }

        public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'user_name' => 'required',
            'tema_id' => 'required',
            'comentario' => 'required | max: 500',
            ] );

        ComentarioTema::create(['user_id' => $request->user_id,
        'user_name' => $request->user_name,
        'tema_id' => $request->tema_id,
        'valoracion' => 0,
        'comentario' => $request->comentario]);

        $tema = TemaForo::get()->where('id', $request->tema_id);

        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();
    }


    public function upvote(Request $request){
        $comentario = ComentarioTema::get()->where('id', $request->id)->first();


        $comentario->valoracion = ($comentario->valoracion + 1);

        $comentario->save();

        $tema = TemaForo::get()->where('id', $request->tema_id);

        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();


    }


    public function downvote(Request $request){
        $comentario = ComentarioTema::get()->where('id', $request->id)->first();



        $comentario->valoracion = ($comentario->valoracion - 1);

        $comentario->save();

        $tema = TemaForo::get()->where('id', $request->tema_id);

        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();


    }
}
