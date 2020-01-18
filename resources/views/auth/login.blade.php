@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')
<main>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center"><h2>{{ __('Login') }}</h2></div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Direccion de Email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control text-center @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Contraseña') }}" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('No cerrar mi sesión al cerrar el navegador') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row text-justify">
              <div class="col-6 text-right">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('¿Olvidaste tu contraseña?') }}
                </a>
              </div>
              <div class="col-6 text-left">
                <a class="btn btn-link" href="{{ route('register') }}">
                  {{ __("¿No tienes una cuenta? Regístrate!") }}
                </a>
              </div>

              <div class="col-12 mt-2 text-center">
                <button type="submit" class="btn btn-dark">
                  {{ __('Login') }}
                </button>
                <button type="button" class="btn btn-dark login-link" id="google" data-toggle="tooltip" data-placement="bottom" title="Iniciar sesión con Google">
                  <i class="fab fa-google"></i>Google
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

@section('script')
<script src="/js/login.js"></script>
<script src="/js/tooltip.js"></script>
@endsection
