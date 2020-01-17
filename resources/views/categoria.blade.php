@extends('layouts.app')

@section('content')
<main>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header text-center"><h2> @if($categoria){{ __('Modificar una categoria') }} @else {{ __('Agregar categoria') }} @endif </h2></div>

              <div class="card-body">
                  <form method="POST" action="@if($categoria) /gestor/modificar-categoria @else /gestor/agregar-categoria @endif">
                      @csrf

                      @if ($categoria)
                        <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
                      @endif

                      <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6 name">
                              <input id="nombre" type="text" class="form-control text-center @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" placeholder="@if($categoria) {{$categoria->nombre}} @else {{ __('Nombre') }} @endif" autocomplete="nombre" autofocus>

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
                                  @if($categoria) {{ __('Modificar') }} @else {{ __('Agregar') }} @endif
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
