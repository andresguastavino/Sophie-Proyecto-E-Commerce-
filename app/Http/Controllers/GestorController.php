<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Marca;
use App\User;

class GestorController extends Controller
{
    public function gestor()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $users = User::all();

        return view('gestor', compact('productos', 'categorias', 'marcas', 'users'));
    }

    public function formProducto(Request $request)
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $producto = '';

        if($request->producto_id) {
          $producto = Producto::find($request->producto_id);
        }

        return view('producto', compact('producto', 'marcas', 'categorias'));
    }

    public function agregarProducto(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['required', 'string', 'max:255', 'unique:productos'],
          'precio' => ['required', 'integer', 'min:0'],
          'descripcion' => ['required', 'string', 'max:255'],
          'imagen' => ['required', 'mimes:jpg,jpeg,png'],
        ],
        [
          'required' => 'El campo :attribute es obligatorio',
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'min' => 'El campo :attribute debe ser como minimo :min',
          'unique' => 'Ya existe una categoria con ese nombre',
          'integer' => 'El campo :attribute debe ser numerico',
          'mimes'=>'El campo :attribute solo admite archivos png, jpg o jpeg',
        ]);

        $producto = new Producto();

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->marca_id = $request->marca_id;
        $producto->imagen = basename($request->file('imagen')->store('public/productos'));

        $producto->save();

        return redirect('/gestor');
    }

    public function modificarProducto(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['string', 'max:255', 'unique:productos', 'nullable'],
          'precio' => ['integer', 'min:0', 'nullable'],
          'descripcion' => ['string', 'max:255', 'nullable'],
          'imagen' => ['mimes:jpg,jpeg,png', 'nullable'],
        ],
        [
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'min' => 'El campo :attribute debe ser como minimo :min',
          'unique' => 'Ya existe una categoria con ese nombre',
          'integer' => 'El campo :attribute debe ser numerico',
          'mimes'=>'El campo :attribute solo admite archivos png, jpg o jpeg',
        ]);

        $producto = Producto::find($request->producto_id);
        $cambios = false;

        if($request->nombre) {
          $producto->nombre = $request->nombre;
          $cambios = true;
        }

        if($request->precio) {
          $producto->precio = $request->precio;
          $cambios = true;
        }

        if($request->descripcion) {
          $producto->descripcion = $request->descripcion;
          $cambios = true;
        }

        if($request->categoria_id != $producto->categoria_id) {
          $producto->categoria_id = $request->categoria_id;
          $cambios = true;
        }

        if($request->marca_id != $producto->marca_id) {
          $producto->marca_id = $request->marca_id;
          $cambios = true;
        }

        if($request->imagen) {
          $producto->imagen = basename($request->file('imagen')->store('public/productos'));
          $cambios = true;
        }

        if($cambios) {
          $producto->save();
        }

        return redirect('/gestor');
    }

    public function quitarProducto(Request $request)
    {
        $producto = Producto::find($request->producto_id);

        $producto->delete();

        return redirect('/gestor');
    }

    public function formCategoria(Request $request)
    {
        $categoria = '';

        if($request->categoria_id) {
          $categoria = Categoria::find($request->categoria_id);
        }

        return view('categoria', compact('categoria'));
    }

    public function agregarCategoria(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['required', 'string', 'max:100', 'unique:categorias'],
        ],
        [
          'required' => 'El campo :attribute es obligatorio',
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'unique' => 'Ya existe una categoria con ese nombre'
        ]);

        $categoria = new Categoria();

        $categoria->nombre = $request->nombre;

        $categoria->save();

        return redirect('/gestor');
    }

    public function modificarCategoria(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['nullable', 'string', 'max:100', 'unique:categorias'],
        ],
        [
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'unique' => 'Ya existe una categoria con ese nombre'
        ]);

        $categoria = Categoria::find($request->categoria_id);

        $categoria->nombre = $request->nombre;

        $categoria->save();

        return redirect('/gestor');
    }

    public function quitarCategoria(Request $request)
    {
        $categoria = Categoria::find($request->categoria_id);

        $categoria->delete();

        return redirect('/gestor');
    }

    public function formMarca(Request $request)
    {
        $marca = '';

        if($request->marca_id) {
          $marca = Categoria::find($request->marca_id);
        }

        return view('marca', compact('marca'));
    }

    public function agregarMarca(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['required', 'string', 'max:100', 'unique:marcas'],
        ],
        [
          'required' => 'El campo :attribute es obligatorio',
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'unique' => 'Ya existe una marca con ese nombre'
        ]);

        $marca = new Marca();

        $marca->nombre = $request->nombre;

        $marca->save();

        return redirect('/gestor');
    }

    public function modificarMarca(Request $request)
    {
        $this->validate($request,
        [
          'nombre' => ['nullable', 'string', 'max:100', 'unique:marcas'],
        ],
        [
          'string' => 'El campo :attribute solo admite caracteres',
          'max' => 'El campo :attribute admite un maximo de :max caracteres',
          'unique' => 'Ya existe una categoria con ese nombre'
        ]);

        $marca = Categoria::find($request->marca_id);

        $marca->nombre = $request->nombre;

        $marca->save();

        return redirect('/gestor');
    }

    public function quitarMarca(Request $request)
    {
        $marca = Marca::find($request->marca_id);

        $marca->delete();

        return redirect('/gestor');
    }

    public function darAdmin(Request $request)
    {
        $user = User::find($request->user_id);

        $user->admin = true;

        $user->save();

        return redirect('/gestor');
    }

    public function quitarAdmin(Request $request)
    {
        $user = User::find($request->user_id);

        $user->admin = false;

        $user->save();

        return redirect('/gestor');
    }
}
