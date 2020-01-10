<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Producto;

class CarritoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function listado()
    {
    	$productos = request()->user()->productos;
    	return view('carrito', compact('productos'));
    }

 	public function agregar(Request $request)
    {
	    $user = $request->user();
	    $user->productos()->attach($request->producto_id);
	    return redirect('/home');
    }

    public function quitar(Request $request) {
		$user = request()->user();
		$user->productos()->detach($request->producto_id);
		return redirect('/carrito');
    }

    public function vaciar() {
	    $user = request()->user();
	    $user->productos()->detach();
	    return redirect('/carrito');
    }
}
