@extends('layouts.app')

@section('content')
	<h2>Carrito</h2>
	@forelse ($productos as $producto)
		{{$producto}}
		<form action="/carrito/quitar" method="post">
			@csrf
			<input type="hidden" name="producto_id" value="{{$producto->id}}">
			<button type="submit">Quitar de mi carrito</button>
		</form>
		<hr>
	@empty
		No tienes productos en el carrito actualmente
	@endforelse
	@if (count($productos))
		<form action="/carrito/vaciar" method="post">
			@csrf
			<button type="submit">Vaciar carrito</button>
		</form>
	@endif
@endsection
