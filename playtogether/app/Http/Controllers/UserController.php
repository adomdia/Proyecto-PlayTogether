<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Amistad;
use App\Models\Publicaciones;

class UserController extends Controller
{
    public function index(Request $request){

        $usuarios = User::paginate(30);

        return view(compact('usuarios'));


    }

    public function edit($id)
    {


        if($user=User::findOrFail($id)){
            return view('user.config', compact('user'));
        }
        return redirect()->back();
    }


    public function update(Request $request)
    {
        //

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            ] );



            if ($request->hasFile('archivo')){

            $request->archivo=$request->file('archivo')->store('uploads', 'public');
            }



        $usuario = User::findOrFail($request->id_user);


        $usuario->name = $request->name;
        $usuario->l_name = $request->l_name;
        $usuario->foto = $request->archivo;


        $usuario->save();

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $publicaciones = Publicaciones::whereIn('id_user', $amistad)->get();
        $amigos = User::get()->whereIn('id', $amistad);
        $cAmigos = User::get()->whereIn('id', $amistad)->count();


        return view('home', compact('user', 'amigos', 'cAmigos', 'publicaciones'));
    }

    public function fPerfil(Request $request){
        dd($request);
    }
}
