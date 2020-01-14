@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/carrito.css">
@endsection

@section('content')
<main>
	<div id="title">
		<h2>Carrito</h2>
	</div>

	<section class="prodcutos">

		@forelse ($productos as $producto)

			<article class="producto">
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-4 imagen-producto">
							<img src="/storage/productos/{{$producto->imagen}}" class="card-img" alt="...">
						</div>
						<div class="separation-div"></div>
						<div class="col-md-7">
							<div class="card-body info-producto">
								<div class="nombre-producto">
									<h4 class="card-title">{{$producto->nombre}}</h4>
								</div>
								<div class="precio-producto">
									<h4 class="card-title">{{$producto->precio}}</h4>
								</div>
								<div class="categoria-producto">
									<h5 class="card-title">{{$producto->categoria->nombre}}</h5>
								</div>
								<div class="marca-producto">
									<h5 class="card-title">{{$producto->marca->nombre}}</h5>
								</div>
								<div class="descripcion-producto">
									<p>{{$producto->descripcion}}</p>
								</div>
								<div class="botones">
									<form action="/carrito/quitar" method="post">
										@csrf
										<input type="hidden" name="producto_id" value="{{$producto->id}}">
										<button type="submit">Quitar de mi carrito</button>
									</form>
									<form action="/carrito/comprar" method="post">
										@csrf
										<input type="hidden" name="producto_id" value="{{$producto->id}}">
										<button type="submit">Comprar</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>

		@empty

			<h2>No tienes productos en el carrito actualmente</h2>

		@endforelse

	</section>

	@if (count($productos))

		<form action="/carrito/vaciar" method="post">
			@csrf
			<button type="submit">Vaciar carrito</button>
		</form>

	@endif

</main>
@endsection
