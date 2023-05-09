<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amistad;

class AmistadController extends Controller
{
    public function store(Request $request)
    {
        //
        // $datosPublicacion = request()->all();

        dd($request);

        $request->validate([
            'user_1' => 'required',
            'user_2' => 'required',
            ] );


        Amistad::create(['user_1' => $request->user_1,
                        'user_2' => $request->user_2]);


        $id = auth()->user()->id;
        $user = User::get()->where('id', $id)->first();

        return view('home', compact('user'));
    }
}
