<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function listado()
    {
      $productos = Producto::all();
      $categorias = \App\Categoria::all();
      $marcas = \App\Marca::all();

      return view('home', compact('productos', 'categorias', 'marcas'));
    }

    public function detalle(Request $request)
    {
      $producto = Producto::find($request->id);

      return view('detalle', compact('producto'));
    }

    public function filtrarPorCategoria($categoria_id)
    {
      $productos = \App\Categoria::find($categoria_id)->productos;
      $categorias = \App\Categoria::all();
      $marcas = \App\Marca::all();

      return view('home', compact('productos', 'categorias', 'marcas'));
    }

    public function filtrarPorMarca($marca_id)
    {
      $productos = \App\Marca::find($marca_id)->productos;
      $categorias = \App\Categoria::all();
      $marcas = \App\Marca::all();

      return view('home', compact('productos', 'categorias', 'marcas'));
    }
}
