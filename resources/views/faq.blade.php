@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.theme.min.css">

<link rel="stylesheet" href="/css/faq.css">
@endsection

@section('content')
<main>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header text-center"><h2>{{ __('Frequently Asked Questions') }}</h2></div>

              <div class="card-body">
                <div id="acordeon">
                  <h3 class="text-center">¿Qué es Sophie?</h3>
                  <div class="text-center">
                    Sophie es un sitio web diseñado para poder ver y comprar productos de ropa femeninos desde la comodidad de su casa.
                  </div>

                  <h3 class="text-center">¿Como comprar en Sophie?</h3>
                  <div class="text-center">
                    Para poder comprar algún producto de Sophie deberá seguir los siguientes pasos.
                    <ol class="text-center">
                      <li>Iniciar sesión en su cuenta de Sophie.</li>
                      <li>Agregar el producto que desee comprar a su carrito.</li>
                      <li>Proceder a hacer la compra del mismo.</li>
                    </ol>
                  </div>

                  <h3 class="text-center">¿Qué metodos de pago acepta Sophie?</h3>
                  <div class="text-center">
                    Sophie utiliza la api de MercadoPago para que usted haga el pago de su producto, lo que significa que tiene a su disponibilidad
                    todos los métodos de pago de MercadoPago.
                  </div>

                  <h3 class="text-center">Ahora en serio, ¿qué es Sophie?</h3>
                  <div class="text-center">
                    Sophie es un proyecto de ecommerce desarrollado para demostrar mis habilidades como desarrollador web y con la finalidad de sumarlo a mi portafolio para el momento de buscar trabajo.
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="/js/jquery-ui/jquery-ui.min.js"></script>

<script src="/js/acordeon.js"></script>
@endsection
