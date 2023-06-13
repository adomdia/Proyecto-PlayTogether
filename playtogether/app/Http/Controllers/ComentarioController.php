<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\User;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        //
        // dd($request);

        $request->validate([
            'id_user' => 'required',
            'id_publicacion' => 'required',
            'texto' => 'required | max: 500',
            ] );

        $usuario = User::get()->where('id', $request->id_user)->first();


        Comentarios::create(['id_user' => $request->id_user,
        'user_name' => $usuario->name,
        'user_foto' => $usuario->foto,
        'id_publicacion' => $request->id_publicacion,
        'texto' => $request->texto]);


        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();

        // return response()->json($datosPublicacion);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $comentario=Comentarios::findOrFail($id);

        Comentarios::destroy($id);

        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return redirect()->back();
    }

}
