@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/carrito.css">
@endsection

@section('content')
<main>
	@forelse ($productos as $producto)
		<div class="card">
	    <div class="row no-gutters">
	      <div class="col-md-4 imagen-producto">
	        <img src="/storage/productos/{{$producto->imagen}}" class="card-img" alt="...">
	      </div>
	      <div class="col-md-8">
	        <div class="card-body info-producto">
	          <div class="nombre-producto">
	            <h4 class="card-title"><strong class="cursive">Producto:</strong> {{$producto->nombre}}</h4>
	          </div>
	          <div class="div-separacion"></div>
	          <div class="precio-producto">
	            <h4 class="card-title"><strong class="cursive">Precio (ARS):</strong> ${{$producto->precio}}</h4>
	          </div>
	          <div class="div-separacion"></div>
	          <div class="categoria-producto">
	            <h4 class="card-title"><strong class="cursive">Categoria del producto:</strong> {{$producto->categoria->nombre}}</h4>
	          </div>
	          <div class="div-separacion"></div>
	          <div class="marca-producto">
	            <h4 class="card-title"><strong class="cursive">Marca del producto:</strong> {{$producto->marca->nombre}}</h4>
	          </div>
	          <div class="div-separacion"></div>
	          <div class="descripcion-producto">
	            <h4 class="card-title"><strong class="cursive">Sobre este producto:</strong></h4>
	            <p>{{$producto->descripcion}}</p>
	          </div>
	          <div class="div-separacion"></div>
						<div class="botones">
							<form action="/carrito/comprar" method="post">
								@csrf
								<input type="hidden" name="producto_id" value="{{$producto->id}}">
								<button type="submit" class="btn btn-dark"><i class="fas fa-money-bill-wave"></i>Comprar</button>
							</form>
							<form action="/carrito/quitar" method="post">
								@csrf
								<input type="hidden" name="producto_id" value="{{$producto->id}}">
								<button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i>Quitar de mi carrito</button>
							</form>
						</div>
	        </div>
	      </div>
	    </div>
	  </div>

	@empty

		<h2>No tienes productos en el carrito actualmente</h2>

	@endforelse

	@if (count($productos))

		<form action="/carrito/vaciar" class="text-right" method="post">
			@csrf
			<button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i>Vaciar carrito</button>
		</form>

	@endif

</main>
@endsection
