<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicaciones;
use App\Models\User;
use App\Models\Comentarios;

class PublicacionController extends Controller
{

    public function index(Request $request){
        // dd($request);
        $id_user = auth()->user()->id;
        $user = User::get()->where('id', $id_user)->first();
        $publicaciones = Publicaciones::get()->where('id_user', $id_user);


        $fotos = $publicaciones->where('tipo', 'Foto')->count();
        $audio = $publicaciones->where('tipo', 'Audio')->count();
        $video = $publicaciones->where('tipo', 'Video')->count();

        return view("publicaciones.index", compact('publicaciones', 'user', 'fotos', 'audio', 'video'));
    }


    public function show($id){
        $publicacion = Publicaciones::where('id', $id)->first();
        $id_owner = $publicacion->id_user;
        $owner = User::get()->where('id', $id_owner)->first();
        $comentarios = Comentarios::get()->where('id_publicacion', $id);


        $id_user = auth()->user()->id;
        $user = User::get()->where('id', $id_user)->first();

        return view('publicaciones.show', compact('publicacion', 'user', 'owner', 'comentarios'));
    }
    public function create()
    {
        //
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
        // $datosPublicacion = request()->all();

        $request->validate([
            'tipo' => 'required',
            'titulo' => 'required | max: 500',
            'descripcion' => 'max:1000 | required',
            ] );

        $datosPublicacion = request()->except('_token');
        if ($request->hasFile('archivo')){

            $request->archivo=$request->file('archivo')->store('uploads', 'public');
        }

        Publicaciones::create(['tipo' => $request->tipo,
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'id_user' => $request->id_user,
        'archivo' => $request->archivo]);


        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return view('home', compact('user'));

    }
        public function destroy(Request $request)
        {
            $id = $request->id;

            $publicacion=Publicaciones::findOrFail($id);

            Storage::delete('public/'.$publicacion->archivo);
            Publicaciones::destroy($id);

            $id_user = auth()->user()->id;
            $publicaciones = Publicaciones::get()->where('id_user', $id_user);
            $user = User::get()->where('id', $id_user)->first();

            $fotos = Publicaciones::get()->where('tipo', 'Foto')->count();
            $audio = Publicaciones::get()->where('tipo', 'Audio')->count();
            $video = Publicaciones::get()->where('tipo', 'Video')->count();

            return view("publicaciones.index", compact('publicaciones', 'user', 'fotos', 'audio', 'video'));
        }

        // return response()->json($datosPublicacion);
    }
