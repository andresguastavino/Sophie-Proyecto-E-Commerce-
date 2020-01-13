<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\User;

class ConsultaController extends Controller
{

    public function contacto()
    {
      $user = request()->user();

      if($user) {
        $consultas_usuario = $user->consultas()->get();

        $consultas = Consulta::where('user_id', '!=', $user->id)->get();

        return view('contacto', compact('consultas_usuario', 'consultas'));
      } else {
        $consultas = Consulta::all();

        return view('contacto', compact('consultas'));
      }
    }

}
