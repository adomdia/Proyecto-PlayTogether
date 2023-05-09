<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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



        $usuario = User::findOrFail($request->id_user);


        $usuario->name = $request->name;
        $usuario->l_name = $request->l_name;


        $usuario->save();

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        return view('home', compact('user'));
    }

    public function fPerfil(Request $request){
        dd($request);
    }
}
