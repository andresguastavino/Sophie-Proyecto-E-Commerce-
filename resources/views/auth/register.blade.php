@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6 name">
                                <input id="name" type="text" class="form-control text-center @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Tu nombre') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6 password">
                                <input id="password" type="password" class="form-control text-center @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Una contraseña') }}" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmación') }}</label>

                            <div class="col-md-6 confirmation">
                                <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" placeholder="{{ __('Repita la contraseña') }}" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="accept" id="accept" {{ old('accept') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="accept" style="text-align: center;">
                                      {{ __('Estoy de acuerdo con la ') }}<a href="/politica_privacidad" target="_blank"><u>{{ __('Politica de Privacidad de Sophie') }}</u></a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark" name="button">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/form-validation.js"></script>
@endsection
