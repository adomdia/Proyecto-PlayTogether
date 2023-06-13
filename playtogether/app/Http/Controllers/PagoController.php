<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

use App\Models\User;
use App\Models\Curso;
use App\Models\CursosComprados;

class PagoController extends Controller
{

    public function index(){
        $user = auth()->user();

        return view('pago', compact('user'));
    }

    public function procesarPago(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Charge::create([
                'amount' => 1000,
                'currency' => 'eur',
                'source' => $request->stripeToken,
                'description' => 'Descripción del producto o servicio',
            ]);

            $id = auth()->id();
            $user = User::get()->where('id', $id)->first();
            $curso = Curso::get()->where('id', $request->id_curso)->first();

            CursosComprados::create([
                'user_compra' => $user->id,
                'id_user' => $curso->id_user,
                'nombre_user' => $curso->nombre_user,
                'foto' => $curso->foto,
                'descripcion' => $curso->descripcion,
                'titulo' => $curso->titulo,
                'id_curso' => $curso->id,
            ]);

            return view('curso', compact('curso', 'user'));
        } catch (\Exception $e) {

                $id = auth()->id();
                $user = User::get()->where('id', $id)->first();
                $cursos_comprados = CursosComprados::get()->where('user_compra', $user->id);
                $id_cursos_comprados = CursosComprados::where('user_compra', $user->id)->pluck('id_curso')->toArray();

                $ccursos = Curso::all()->whereNotIn('id', $id_cursos_comprados)->count();
                return view('cursos', compact('cursos', 'user', 'cursos_comprados', 'ccursos'))->with('error', $e->getMessage());

            };
        }
    }
