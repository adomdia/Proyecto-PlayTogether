<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\CursosComprados;
use App\Models\User;

class CursoController extends Controller
{
    public function index(){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $cursos_comprados = CursosComprados::get()->where('user_compra', $user->id);
        $id_cursos_comprados = CursosComprados::where('user_compra', $user->id)->pluck('id_curso')->toArray();

        $cursos = Curso::all()->whereNotIn('id', $id_cursos_comprados);
        $ccursos = Curso::all()->whereNotIn('id', $id_cursos_comprados)->count();
        return view('cursos', compact('cursos', 'user', 'cursos_comprados', 'ccursos'));
    }

    public function crearcurso(){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        return view('crearcurso', compact('user'));
    }

    public function store(Request $request){



        $request->validate([
            'titulo' => 'required | max: 500',
            'descripcion' => 'max:1000 | required',
            'leccion' => 'max:1000 | required',
            'precio' => 'required',
            ] );

        if ($request->hasFile('archivo')){


            $request->archivo=$request->file('archivo')->store('uploads', 'public');
        }


        Curso::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'id_user' => $request->user_id,
        'video' => $request->archivo,
        'precio' => $request->precio,
        'texto' => $request->leccion,
        'nombre_user' => $request->user_name,
        'foto' => $request->user_foto
    ]);

    $id = auth()->id();
    $user = User::get()->where('id', $id)->first();
    $cursos_comprados = CursosComprados::get()->where('user_compra', $user->id);
    $id_cursos_comprados = CursosComprados::where('user_compra', $user->id)->pluck('id_curso')->toArray();

    $cursos = Curso::all()->whereNotIn('id', $id_cursos_comprados);
    $ccursos = Curso::all()->whereNotIn('id', $id_cursos_comprados)->count();
    return view('cursos', compact('cursos', 'user', 'cursos_comprados', 'ccursos'));

    }


    public function single($id){
        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $curso = Curso::get()->where('id', $id)->first();
        return view('curso_single', compact('curso', 'user'));
    }



    public function destroy(Request $request)
    {
        $id = $request->id;

        $comentario=Curso::findOrFail($id);

        Curso::destroy($id);

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $cursos_comprados = CursosComprados::get()->where('user_compra', $user->id);
        $id_cursos_comprados = CursosComprados::where('user_compra', $user->id)->pluck('id_curso')->toArray();

        $cursos = Curso::all()->whereNotIn('id', $id_cursos_comprados);
        $ccursos = Curso::all()->whereNotIn('id', $id_cursos_comprados)->count();
        return view('cursos', compact('cursos', 'user', 'cursos_comprados', 'ccursos'));
    }
}
