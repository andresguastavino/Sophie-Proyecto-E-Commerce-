@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
<main>
	<aside>
		<div class="categorias">
			<h4>Por categorias</h4>
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
	</aside>
	<section class="productos">
		@foreach ($productos as $producto)
			<article class="producto">
				<div class="imagen-producto">
					<img src="/storage/productos/{{$producto->imagen}}">
				</div>
				<div class="info-producto">
					<div class="nombre-producto">
						<h2 class="text-wrap">{{$producto->nombre}}</h2>
					</div>
					<div class="precio-producto">
						<h2 class="text-wrap">${{$producto->precio}}</h2>
					</div>
					<div class="descripcion-producto">
						<p>{{$producto->descripcion}}</p>
					</div>
					<div class="botones">
						<form action="/home/{{ $producto->id }}" method="get">
							<button type="submit">Ver mas</button>
						</form>
						<form action="aniadir.html" method="post">
							<button type="submit">Aniadir al carro</button>
						</form>
					</div>
				</div>
			</article>
		@endforeach
	</section>
</main>
@endsection
