<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class ModoOscuroController extends Controller
{
    public function cambiarModo(Request $request)
    {
        $theme = $request->cookie('theme');

        if ($theme && $theme === 'dark') {
            Cookie::queue('theme', 'light', 60 * 24 * 7); //60min * 24h * 7días
        } else {
            Cookie::queue('theme', 'dark', 60 * 24 * 7);
        }

        return redirect()->back();
    }
}
