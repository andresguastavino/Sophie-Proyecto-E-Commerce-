@extends('layouts.app')

@section('content')
<main>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header text-center"><h2> @if($producto){{ __('Modificar un producto') }} @else {{ __('Agregar producto') }} @endif </h2></div>

              <div class="card-body">
                  <form method="POST" action="@if($producto) /gestor/modificar-producto @else /gestor/agregar-producto @endif" enctype="multipart/form-data">
                      @csrf

                      @if ($producto)
                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                      @endif

                      <div class="form-group row">
                          <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                          <div class="col-md-6">
                              <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" autocomplete="imagen" autofocus>

                              @error('imagen')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6">
                              <input id="nombre" type="text" class="form-control text-center @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" placeholder="@if($producto) {{$producto->nombre}} @else {{ __('Nombre') }} @endif" autocomplete="nombre" autofocus>

                              @error('nombre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                          <div class="col-md-6">
                              <input id="precio" type="text" class="form-control text-center @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" placeholder="@if($producto) {{$producto->precio}} @else {{ __('Precio') }} @endif" autocomplete="precio" autofocus>

                              @error('precio')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                          <div class="col-md-6">
                              <select id="marca" class="form-control text-center" name="marca_id" autocomplete="marca" autofocus>
                                @foreach ($marcas as $marca)
                                  <option value="{{$marca->id}}" @if($producto && $producto->marca_id == $marca->id){{'selected'}}@endif>{{$marca->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                          <div class="col-md-6">
                              <select id="categoria" class="form-control text-center" name="categoria_id" autocomplete="categoria" autofocus>
                                @foreach ($categorias as $categoria)
                                  <option value="{{$categoria->id}}" @if($producto && $producto->categoria_id == $categoria->id){{'selected'}}@endif>{{$categoria->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                          <div class="col-md-6 name">
                              <textarea id="descripcion" name="descripcion" class="form-control text-center @error('descripcion') is-invalid @enderror" placeholder="@if($producto) {{$producto->descripcion}} @else {{ __('Descripcion del producto') }} @endif" autocomplete="descripcion" autofocus rows="4" cols="80" style="resize: none;">{{ old('descripcion') }}</textarea>

                              @error('descripcion')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-dark" name="button">
                                  @if($producto) {{ __('Modificar') }} @else {{ __('Agregar') }} @endif
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
