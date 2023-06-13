<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MensajeChat;
use App\Models\User;

class ChatController extends Controller
{
    public function index($id){


        $user = auth()->user();

        $recive = User::get()->where('id', $id)->first();
        $mensajes = MensajeChat::orderby('created_at', 'asc')->get()->wherein('user_send',[$user->id, $id])->wherein('user_recive',[$user->id, $id]);
        $cmensaje = MensajeChat::get()->wherein('user_send',[$user->id, $id])->wherein('user_recive',[$user->id, $id])->count();



        return view('chat', compact('user', 'recive', 'mensajes', 'cmensaje'));
    }

    public function send(Request $request){

        // dd($request);

        $request->validate([
            'mensaje' => 'required| max: 500',
            ] );

        MensajeChat::create(['user_send' => $request->send,
        'user_send_name' => $request->user_name,
        'user_send_foto' => $request->user_foto,
        'user_recive' => $request->recive,
        'text' => $request->mensaje]);


        $user = auth()->user()->first();
        $recive = User::get()->where('id', $request->recive)->first();
        $mensajes = MensajeChat::get()->whereIn('user_send', [$user->id, $request->recive])->whereIn('user_recive',[$user->id, $request->recive]);
        // $mensaje = MensajeChat::get()->where('user_send',[$user->id, $request->recive])->where('user_recive',[$user->id, $request->recive]);
        $cmensaje = MensajeChat::get()->whereIn('user_send',[$user->id, $request->recive])->whereIn('user_recive',[$user->id, $request->recive])->count();

        return redirect()->back();

    }



}
