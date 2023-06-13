<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Amistad;
use App\Models\Publicaciones;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id = auth()->id();
        $user = User::get()->where('id', $id)->first();
        $amistad = Amistad::select('user_2')->where('user_1', $id)->pluck('user_2')->toArray();
        $publicaciones = Publicaciones::orderBy('created_at', 'desc')->whereIn('id_user', $amistad)->get();
        $amigos = User::get()->whereIn('id', $amistad);
        $cAmigos = User::get()->whereIn('id', $amistad)->count();


        return view('home', compact('user', 'amigos', 'cAmigos', 'publicaciones'));
    }
}
