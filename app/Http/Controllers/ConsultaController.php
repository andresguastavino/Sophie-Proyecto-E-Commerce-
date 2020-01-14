<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;

class ConsultaController extends Controller
{

    public function contacto()
    {
      $user = request()->user();

      if($user) {
        $consultas_usuario = Consulta::where('email', '=', $user->email)->get();

        $consultas = Consulta::where('email', '!=', $user->email)->get();

        return view('contacto', compact('consultas_usuario', 'consultas'));
      } else {
        $consultas = Consulta::all();

        return view('contacto', compact('consultas'));
      }
    }

    public function enviar(Request $request)
    {
      $consulta = new Consulta();

      $consulta->asunto = $request->asunto;
      $consulta->consulta = $request->consulta;

      if($request->user()) {
        $consulta->email = $request->user()->email;
      } else {
        $consulta->email = $request->email;
      }

      $consulta->save();

      return redirect('/contacto');
    }

}
