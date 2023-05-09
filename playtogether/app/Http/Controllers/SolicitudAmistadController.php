<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitudes;

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
        'user_2' => $request->user_1]);


        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return view('home', compact('user'));
}
}
