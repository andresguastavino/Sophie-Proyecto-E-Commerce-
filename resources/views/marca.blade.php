@extends('layouts.app')

@section('content')
<main>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header text-center"><h2> @if($marca){{ __('Modificar una marca') }} @else {{ __('Agregar marca') }} @endif </h2></div>

              <div class="card-body">
                  <form method="POST" action="@if($marca) /gestor/modificar-marca @else /gestor/agregar-marca @endif">
                      @csrf

                      @if ($marca)
                        <input type="hidden" name="marca_id" value="{{$marca->id}}">
                      @endif

                      <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6 name">
                              <input id="nombre" type="text" class="form-control text-center @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" placeholder="{{ __('Nombre') }}" autocomplete="nombre" autofocus>

                              @error('nombre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-dark" name="button">
                                  @if($marca) {{ __('Modificar') }} @else {{ __('Agregar') }} @endif
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
