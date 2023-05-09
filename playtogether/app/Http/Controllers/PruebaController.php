<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index(){
        return view('prueba');
    }

    public function index1(){
        return view('prueba1');
    }
}
