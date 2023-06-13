<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Chat;


class MensajeChatController extends Controller
{
    public function store(Request $request){

        $user1 = User::where('id', $request->user1);
        $user2 = User::where('id', $request->user2);

        $chat1 = Chat::get()->where('user_1', $user1->id)->where('user_2', $user2->id)->count();
        $chat2 = Chat::get()->where('user_2', $user2->id)->where('user_1', $user1->id)->count();

        dd($chat1, $chat2);


    }
}
