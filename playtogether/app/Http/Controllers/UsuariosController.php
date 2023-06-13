<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitudes;
use App\Models\Publicaciones;
use App\Models\Amistad;

use App\Models\Curso;
use App\Models\CursosComprados;


class UsuariosController extends Controller
{
    public function index(){

        $id = auth()->id();
        $solicitudes = Solicitudes::get()->where('user_2', $id);
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $usuarios = User::get()->whereNotIn('id', $amistad);
        $user = User::get()->where('id', $id)->first();

        return view('usuarios', compact('user', 'usuarios', 'solicitudes'));
    }

    public function mostrar($id){

        $usuario = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $amigos = User::get()->whereIn('id', $amistad);
        $publicaciones = Publicaciones::orderByDesc('id')->get()->where('id_user', $id);
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $cAmigos = User::get()->whereIn('id', $amistad)->count();

        return view('perfil', compact('usuario', 'publicaciones', 'user', 'amigos', 'cAmigos'));
    }

    public function destroy(Request $request)
    {
        $id_user = $request->id_user;

        $usuario = Usuario::findOrFail($id_user);

        Storage::delete('public/'.$user->foto);
        User::destroy($id_user);

        $id = auth()->id();
        $solicitudes = Solicitudes::get()->where('user_2', $id);
        $amistad = Amistad::get()->where('user_1', $id);
        $usuarios = User::get()->whereNotIn('id', $id);
        $user = User::get()->where('id', $id)->first();

        return view('usuarios', compact('user', 'usuarios', 'solicitudes'));

    }

}
