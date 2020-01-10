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

    public function quitar(Request $request)
		{
				$user = request()->user();
				$user->productos()->detach($request->producto_id);
				return redirect('/carrito');
    }

    public function vaciar()
		{
		    $user = request()->user();
		    $user->productos()->detach();
		    return redirect('/carrito');
    }

		public function comprar(Request $request)
		{
				// Agrego las credenciales
				\MercadoPago\SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));

				// Busco la info del producto en la bdd
				$producto = \App\Producto::find($request->producto_id);

				// Crea un objeto de preferencia
				$preference = new \MercadoPago\Preference();

				// Crea un ítem en la preferencia
				$item = new \MercadoPago\Item();
				$item->id = $producto->id;
				$item->title = $producto->nombre;
				$item->description = $producto->descripcion;
				$item->quantity = 1;
				$item->unit_price = $producto->precio;
				$item->currency_id = 'ARS';
				$preference->items = array($item);

				// Creo un payer en la preferencia
				$payer = new \MercadoPago\Payer();
				$payer->id = request()->user()->id;
				$payer->name = request()->user()->name;
				$payer->email = request()->user()->email;
				$preference->payer = $payer;

				// Configuro el callback
				$preference->back_urls = array(
				    "success" => "http://localhost:8000/compra/exito",
				    "failure" => "http://localhost:8000/compra/exito",
				    "pending" => "http://localhost:8000/compra/exito"
				);
				$preference->auto_return = "approved";

				// Configuro el binary-mode asi solo puede aceptar o rechazar el pago
				$preference->binary_mode = true;

				// Guardo la preferencia
				$preference->save();

				// Redirijo a mercadopago para realizar el pago
				return redirect($preference->init_point);
		}
}
