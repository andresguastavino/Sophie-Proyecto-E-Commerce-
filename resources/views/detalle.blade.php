@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/detalle.css">
@endsection

@section('content')
<main>
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
						<form action="/carrito/agregar" method="post">
							@csrf
							<input type="hidden" name="producto_id" value="{{$producto->id}}">
							<button type="submit"><i class="fas fa-cart-plus"></i>Añadir al carro</button>
						</form>
					</div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
