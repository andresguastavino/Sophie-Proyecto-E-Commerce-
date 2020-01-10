<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    * public function __construct()
    * {
    *    $this->middleware('auth');
    * }
    */

    public function faq()
    {
        return view('faq');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function politica_privacidad()
    {
        return view('politica_privacidad');
    }

    public function compraExito()
    {
      dd(request()->preference_id);
      return view('compra_exito');
    }
}
