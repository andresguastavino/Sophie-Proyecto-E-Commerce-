@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="js/jquery-ui/jquery-ui.theme.min.css">

<link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
<main>
	<aside>
		<div class="categorias">
			<h4>Por categorías</h4>
			<ul>
				@foreach ($categorias as $categoria)
					<li><a href="/home/categoria/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="div-separacion"></div>
		<div class="marcas">
			<h4>Por marcas</h4>
			<ul>
				@foreach ($marcas as $marca)
					<li><a href="/home/marca/{{ $marca->id }}">{{ $marca->nombre }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="div-separacion"></div>
		<div class="limpiar">
			<ul>
				<li><a href="/home">Limpiar filtros</a></li>
			</ul>
		</div>
	</aside>
	<section class="productos">
		@foreach ($productos as $producto)
			<article class="producto">
				<div class="imagen-producto">
					<img src="/storage/productos/{{$producto->imagen}}">
				</div>
				<div class="info-producto">
					<div class="nombre-producto">
						<h4 class="text-wrap" id="nombre">{{$producto->nombre}}</h4>
					</div>
					<div class="precio-producto">
						<h4 class="text-wrap">${{$producto->precio}}</h4>
					</div>
					<div class="descripcion-producto">
						<p>{{$producto->descripcion}}</p>
					</div>
					<div class="botones">
						<form action="/home/{{ $producto->id }}" method="get">
							<button type="submit" class="btn btn-dark"><i class="fas fa-info-circle"></i>Ver en detalle</button>
						</form>
						<form action="/carrito/agregar" method="post">
							@csrf
							<input type="hidden" name="producto_id" value="{{$producto->id}}">
							<button type="submit" class="btn btn-dark"><i class="fas fa-cart-plus"></i>Añadir al carro</button>
						</form>
					</div>
				</div>
			</article>
		@endforeach
	</section>
	<div id="go-top">
		<i class="fas fa-chevron-circle-up" title="Ir arriba"></i>
	</div>
</main>
@endsection

@section('script')
<script src="js/jquery-ui/jquery-ui.min.js"></script>

<script src="/js/selected.js"></script>
<script src="/js/scrollTop.js"></script>
<script src="/js/search-bar.js"></script>
<script src="/js/tooltip.js"></script>
@endsection
