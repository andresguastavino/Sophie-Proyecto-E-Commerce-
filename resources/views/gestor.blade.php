@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.theme.min.css">

<link rel="stylesheet" href="/css/gestor.css">
@endsection

@section('content')
<main>
  <div class="card">
    <div class="card-header text-center"><h2>{{ __('Gestor') }}</h2></div>

    <div class="card-body" id="tabs">
      <ul>
        <li><a href="#tabs-1">Productos</a></li>
        <li><a href="#tabs-2">Marcas</a></li>
        <li><a href="#tabs-3">Categorias</a></li>
        <li><a href="#tabs-4">Usuarios</a></li>
      </ul>

      <div id="tabs-1">
        <div class="row">
          <div class="col-3">
            <input type="text" class="text-center" name="filtrar_producto" placeholder="Filtrar" value="">
          </div>
          <div class="col-6 row">
            <div class="col-6">
              <input type="radio" class="mr-2" name="filtrar_producto" id="id_producto" value="id" checked><label for="id_producto">Buscar por id</label>
            </div>
            <div class="col-6">
              <input type="radio" class="mr-2" name="filtrar_producto" id="nombre_producto" value="nombre"><label for="nombre_producto">Buscar por nombre</label>
            </div>
            <div class="col-6">
              <input type="radio" class="mr-2" name="filtrar_producto" id="marca_producto" value="marca_producto"><label for="marca_producto">Buscar por marca</label>
            </div>
            <div class="col-6">
              <input type="radio" class="mr-2" name="filtrar_producto" id="categoria_producto" value="categoria_producto"><label for="categoria_producto">Buscar por categoria</label>
            </div>
          </div>
          <div class="col-3">
            <form action="/gestor/agregar-producto" method="GET" class="@if(!Auth::user()->admin) disabled @endif">
              <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Agregar un producto nuevo"><i class="fas fa-plus"></i>Agregar nuevo</button>
            </form>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-1 text-center">
            Id
          </div>
          <div class="col-1 text-center">
          </div>
          <div class="col-2 text-center">
            Nombre
          </div>
          <div class="col-2 text-center">
            Precio
          </div>
          <div class="col-2 text-center">
            Marca
          </div>
          <div class="col-2 text-center">
            Categoria
          </div>
          <div class="col-1 text-center">
          </div>
          <div class="col-1 text-center">
          </div>
        </div>
        <hr>
        @forelse ($productos as $producto)
          <div class="producto row">
            <div class="col-1 text-center id">
              {{$producto->id}}
            </div>
            <div class="col-1 text-center">
              <i class="fas fa-dot-circle target" onmouseover="show_image('{{$producto->imagen}}', event)" onmouseout="hide_image()" style="color:#000;"></i>
            </div>
            <div class="col-2 text-center nombre">
              {{$producto->nombre}}
            </div>
            <div class="col-2 text-center">
              {{$producto->precio}}
            </div>
            <div class="col-2 text-center marca_producto">
              {{$producto->marca->nombre}}
            </div>
            <div class="col-2 text-center categoria_producto">
              {{$producto->categoria->nombre}}
            </div>
            <div class="col-1 text-center">
              <form action="/gestor/modificar-producto" method="get" class="@if(!Auth::user()->admin) disabled @endif">
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Modificar producto"><i class="fas fa-tools"></i></button>
              </form>
            </div>
            <div class="col-1 text-center">
              <form action="/gestor/quitar-producto" method="post" class="@if(!Auth::user()->admin) disabled @endif">
                @csrf
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <button type="submit" class="btn btn-dark" name="button" data-toggle="tooltip" data-placement="bottom" title="Eliminar producto"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
            <div class="col-12 text-center">
              <hr>
            </div>
          </div>
        @empty
          <h2>No hay productos para gestionar</h2>
        @endforelse
      </div>

      <div id="tabs-2">
        <div class="row">
          <div class="col-3">
            <input type="text" class="text-center" id="filtrar_marca" placeholder="Filtrar" value="">
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_marca" id="id_marca" value="id" checked><label for="id_marca">Buscar por id</label>
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_marca" id="nombre_marca" value="nombre"><label for="nombre_marca">Buscar por nombre</label>
          </div>
          <div class="col-3">
            <form action="/gestor/agregar-marca" method="GET" class="@if(!Auth::user()->admin) disabled @endif">
              <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Agregar una marca nueva"><i class="fas fa-plus"></i>Agregar nueva</button>
            </form>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-1 text-center">
            Id
          </div>
          <div class="col-3 text-center">
            Nombre
          </div>
          <div class="col-2 text-center">
            Productos
          </div>
          <div class="col-3 text-center">
            Modificar
          </div>
          <div class="col-3 text-center">
            Eliminar
          </div>
        </div>
        <hr>
        @forelse ($marcas as $marca)
          <div class="marca row">
            <div class="col-1 text-center id">
              {{$marca->id}}
            </div>
            <div class="col-3 text-center nombre">
              {{$marca->nombre}}
            </div>
            <div class="col-2 text-center">
              {{count($marca->productos)}}
            </div>
            <div class="col-3 text-center">
              <form action="/gestor/modificar-marca" method="get" class="@if(!Auth::user()->admin) disabled @endif">
                <input type="hidden" name="marca_id" value="{{$marca->id}}">
                <button type="submit" class="btn btn-dark" name="button" data-toggle="tooltip" data-placement="bottom" title="Modificar marca"><i class="fas fa-tools"></i></button>
              </form>
            </div>
            <div class="col-3 text-center">
              <form action="/gestor/quitar-marca" class="@if(!Auth::user()->admin) disabled @endif" @if(count($marca->productos))onclick="event.preventDefault();"@endif method="post">
                @csrf
                <input type="hidden" name="marca_id" value="{{$marca->id}}">
                <button type="submit" class="btn btn-dark @if(count($marca->productos)) disabled @endif" name="button"  data-toggle="tooltip" data-placement="bottom" title="Eliminar marca"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
            <div class="col-12 text-center">
              <hr>
            </div>
          </div>
        @empty
          <h2>No hay marcas para gestionar</h2>
        @endforelse
      </div>

      <div id="tabs-3">
        <div class="row">
          <div class="col-3">
            <input type="text" class="text-center" name="" id="filtrar_categoria" placeholder="Filtrar" value="">
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_categoria" id="id_categoria" value="id" checked><label for="id_categoria">Buscar por id</label>
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_categoria" id="nombre_categoria" value="nombre"><label for="nombre_categoria">Buscar por nombre</label>
          </div>
          <div class="col-3">
            <form action="/gestor/agregar-categoria" method="GET" class="@if(!Auth::user()->admin) disabled @endif">
              <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Agregar una categoria nueva"><i class="fas fa-plus"></i>Agregar nueva</button>
            </form>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-1 text-center">
            Id
          </div>
          <div class="col-3 text-center">
            Nombre
          </div>
          <div class="col-2 text-center">
            Productos
          </div>
          <div class="col-3 text-center">
            Modificar
          </div>
          <div class="col-3 text-center">
            Eliminar
          </div>
        </div>
        <hr>
        @forelse ($categorias as $categoria)
          <div class="categoria row">
            <div class="col-1 text-center id">
              {{$categoria->id}}
            </div>
            <div class="col-3 text-center nombre">
              {{$categoria->nombre}}
            </div>
            <div class="col-2 text-center">
              {{count($categoria->productos)}}
            </div>
            <div class="col-3 text-center">
              <form action="/gestor/modificar-categoria" method="get" class="@if(!Auth::user()->admin) disabled @endif">
                <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
                <button type="submit" class="btn btn-dark" name="button" data-toggle="tooltip" data-placement="bottom" title="Modificar categoria"><i class="fas fa-tools"></i></button>
              </form>
            </div>
            <div class="col-3 text-center">
              <form action="/gestor/quitar-categoria" class="@if(!Auth::user()->admin) disabled @endif" @if(count($categoria->productos))onclick="event.preventDefault();"@endif method="post">
                @csrf
                <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
                <button type="submit" class="btn btn-dark @if(count($categoria->productos)) disabled @endif" name="button" data-toggle="tooltip" data-placement="bottom" title="Eliminar categoria"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
            <div class="col-12 text-center">
              <hr>
            </div>
          </div>
        @empty
          <h2>No hay categorias para gestionar</h2>
        @endforelse
      </div>

      <div id="tabs-4">
        <div class="row">
          <div class="col-3">
            <input type="text" class="text-center" name="" id="filtrar_user" placeholder="Filtrar" value="">
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_user" id="id_user" value="id" checked><label for="id_user">Buscar por id</label>
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_user" id="nombre_user" value="nombre"><label for="nombre_user">Buscar por nombre</label>
          </div>
          <div class="col-3">
            <input type="radio" class="mr-2" name="filtrar_user" id="email_user" value="email"><label for="email_user">Buscar por email</label>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-2 text-center">
            Id
          </div>
          <div class="col-3 text-center">
            Nombre completo
          </div>
          <div class="col-3 text-center">
            Email
          </div>
          <div class="col-1 text-center">
            Admin
          </div>
          <div class="col-3 text-center">

          </div>
        </div>
        <hr>
        @forelse ($users as $user)
          <div class="row user">
            <div class="col-2 text-center id">
              {{$user->id}}
            </div>
            <div class="col-3 text-center nombre">
              {{$user->name}} {{$user->surname}}
            </div>
            <div class="col-3 text-center email">
              {{$user->email}}
            </div>
            <div class="col-1 text-center">
              {{($user->admin)?'Si':'No'}}
            </div>
            <div class="col-3 text-center">
              @if (!$user->admin)
                <form action="/gestor/dar-admin" method="post" class="@if(!Auth::user()->admin) disabled @endif">
                  @csrf
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button type="submit" class="btn btn-dark" name="button">Dar admin</button>
                </form>
              @else
                <form action="/gestor/quitar-admin" method="post" class="@if(!Auth::user()->admin) disabled @endif">
                  @csrf
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button type="submit" class="btn btn-dark" name="button">Quitar admin</button>
                </form>
              @endif
            </div>
            <div class="col-12 text-center">
              <hr>
            </div>
          </div>
        @empty
          <h2>No hay registros de usuarios para gestionar</h2>
        @endforelse
      </div>

    </div>
  </div>
</main>
@endsection

@section('script')
<script src="/js/jquery-ui/jquery-ui.min.js"></script>

<script src="/js/cookies.js"></script>
<script src="/js/ampliar-imagen.js"></script>
<script src="/js/tabs-gestor.js"></script>
<script src="/js/tooltip.js"></script>
<script src="/js/filtrar.js"></script>
<script src="/js/funciones-admin.js"></script>
@endsection
