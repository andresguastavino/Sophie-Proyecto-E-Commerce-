@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.theme.min.css">

<link rel="stylesheet" href="/css/contacto.css">
@endsection

@section('content')
  <main>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Contacto') }}</div>

                <div class="card-body">
                    <form method="POST" action="/contacto">
                        @csrf

                        @if (Auth::user())

                          <div class="form-group row">
                            <label for="asunto" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

                            <div class="col-md-6 asunto">
                                <input type="text" name="asunto" id="asunto" class="form-control text-center @error('asunto') is-invalid @enderror" value="{{ old('asunto') }}" placeholder="{{ __('Asunto de la consulta') }}" autocomplete="asunto" autofocus></textarea>

                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="consulta" class="col-md-4 col-form-label text-md-right">{{ __('Consulta') }}</label>

                            <div class="col-md-6 consulta">
                                <textarea name="consulta" id="consulta" class="form-control text-center @error('consulta') is-invalid @enderror" cols="80" value="{{ old('consulta') }}" placeholder="{{ __('Tu consulta/duda/pregunta que quieras hacernos') }}" autocomplete="consulta" autofocus></textarea>

                                @error('consulta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                        @else

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                              <div class="col-md-6 email">
                                  <input id="email" type="text" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('ejemplo@ejemplo.com') }}" autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="asunto" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

                            <div class="col-md-6 asunto">
                                <input type="text" name="asunto" id="asunto" class="form-control text-center @error('asunto') is-invalid @enderror" value="{{ old('asunto') }}" placeholder="{{ __('Asunto de la consulta') }}" autocomplete="asunto" autofocus></textarea>

                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="consulta" class="col-md-4 col-form-label text-md-right">{{ __('Consulta') }}</label>

                            <div class="col-md-6 consulta">
                                <textarea name="consulta" id="consulta" class="form-control text-center @error('consulta') is-invalid @enderror" cols="80" value="{{ old('consulta') }}" placeholder="{{ __('Tu consulta/duda/pregunta que quieras hacernos') }}" autocomplete="consulta" autofocus></textarea>

                                @error('consulta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark" name="button">
                                    {{ __('Enviar consulta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
              <div class="card-header text-center">{{ __('Consultas hechas') }}</div>

              <div class="card-body" id="tabs">
                <ul>
                  <li><a href="#tabs-1">Mis consultas</a></li>
                  <li><a href="#tabs-2">Consultas de otros usuarios</a></li>
                </ul>
                <div id="tabs-1">
                  @if (Auth::user())

                      @if (count($consultas_usuario))

                        <div id="acordeon-1">

                          @foreach ($consultas_usuario as $consulta)

                            <h3>{{$consulta->asunto}}</h3>
                            <div class="consulta">
                              {{$consulta->consulta}}
                            </div>

                            @if ($consulta->respuesta)
                              <hr>
                              <div class="respuesta">
                                {{$consulta->respuesta}}
                              </div>
                            @endif

                          @endforeach

                        </div>

                      @else

                        <h2>No hay consultas para mostrar</h2>

                      @endif

                  @else

                    <h2>Debes estar logeado para poder ver las consultas que has hecho</h2>

                  @endif

                </div>
                <div id="tabs-2">

                  @if (count($consultas))

                    <div id="acordeon-2">

                      @foreach ($consultas as $consulta)

                        <h3>{{$consulta->asunto}}</h3>
                        <div class="consulta">
                          {{$consulta->consulta}}
                        </div>
                        
                        @if ($consulta->respuesta)
                          <hr>
                          <div class="respuesta">
                            {{$consulta->respuesta}}
                          </div>
                        @endif

                      @endforeach

                    </div>

                  @else

                    <h2>No hay consultas para mostrar</h2>

                  @endif

                </div>
              </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="/js/jquery-ui/jquery-ui.min.js"></script>

<script src="/js/contacto.js"></script>
<script src="/js/tabs.js"></script>
@endsection
