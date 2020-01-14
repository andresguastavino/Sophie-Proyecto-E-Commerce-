@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.theme.min.css">

<link rel="stylesheet" href="/css/perfil.css">
@endsection

@section('content')
<main>
  <div class="card">
    <div class="row no-gutters">
      <div class="col-md-4 imagen-usuario">
        <img src="/storage/avatars/{{$user->avatar}}" class="card-img" alt="Imagen no encontrada...">
      </div>
      <div class="separation-div"></div>
      <div class="col-md-7">
        <div class="card-body info-usuario">
          <div id="acordeon">
            <h3 class="text-center">Mis datos de usuario</h3>
            <div id="datos">
              <div class="nombre-usuario">
                <h5 class="card-title"><strong>Nombre:</strong> {{$user->name}}</h5>
              </div>
              <div class="apellido-usuario">
                <h5 class="card-title"><strong>Apellido:</strong> {{$user->surname}}</h5>
              </div>
              <div class="email-usuario">
                <h5 class="card-title"><strong>Email:</strong> {{$user->email}}</h5>
              </div>
            </div>

            <h3 class="text-center">Modificar mis datos</h3>
            <div id="modificar">
              <form method="POST" action="/perfil" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="avatar" class="col-md-4 col-form-label text-md-right"><h5><strong>{{ __('Avatar') }}:</strong></h5></label>

                    <div class="col-md-6 avatar">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" autocomplete="avatar" autofocus>

                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right"><h5><strong>{{ __('Nombre') }}:</strong></h5></label>

                    <div class="col-md-6 name">
                        <input id="name" type="text" class="form-control text-center @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ $user->name }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right"><h5><strong>{{ __('Apellido') }}:</strong></h5></label>

                    <div class="col-md-6 surname">
                        <input id="surname" type="text" class="form-control text-center @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="{{ $user->surname }}" autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-dark" name="button">
                            {{ __('Aplicar cambios') }}
                        </button>
                    </div>
                </div>
              </form>
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

@if($errors->isEmpty())
  <script src="/js/acordeon.js"></script>
@else
  <script src="/js/acordeon2.js"></script>
@endif

<script src="/js/perfil-form-validation.js"></script>
@endsection
