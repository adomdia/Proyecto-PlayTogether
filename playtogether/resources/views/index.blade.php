@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Bienvenido  </title>
@endsection
@section('content')
<video class="video-inicio" src={{asset("/videos/fondologin.mp4")}} type="video/mp4" muted autoplay loop >
      </video>
<div class="container   py-5" style="margin:150px auto; background-color: transparent">
    <div class="row w-75 position-absolute top-50 start-50 translate-middle formularios-log">
        <div class="col-md-6  mb-5">
            <div class="card">
                <div class="card-header container-fluid justify-content-center d-flex align-items-sm-center" style="background-color: #2d2196; color: #fff" >{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" id="form_reg" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="l_name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                                @error('l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header container-fluid justify-content-center d-flex align-items-sm-center" style="background-color: #2d2196; color: #fff">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" id="form_log" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tú contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#form_reg').validate({
        rules: {
          nombre: {
            required: true
          },
          apellido: {
            required: true
          },
          correo: {
            required: true,
            email: true
          },
          contrasena: {
            required: true,
            minlength: 8
          }
        },
        messages: {
          nombre: {
            required: 'Por favor, ingresa tu nombre.'
          },
          apellido: {
            required: 'Por favor, ingresa tu apellido.'
          },
          correo: {
            required: 'Por favor, ingresa tu correo electrónico.',
            email: 'Por favor, ingresa un correo electrónico válido.'
          },
          contrasena: {
            required: 'Por favor, ingresa tu contraseña.',
            minlength: 'La contraseña debe tener al menos 8 caracteres.'
          }
        },
        submitHandler: function(form) {
          //alert('Formulario enviado exitosamente.');
          form.submit();
        }
      });
    });

    $(document).ready(function() {
      $('#form_log').validate({
        rules: {
          correo: {
            required: true,
            email: true
          },
          contrasena: {
            required: true,
            minlength: 8
          }
        },
        messages: {
          correo: {
            required: 'Por favor, ingresa tu correo electrónico.',
            email: 'Por favor, ingresa un correo electrónico válido.'
          },
          contrasena: {
            required: 'Por favor, ingresa tu contraseña.',
            minlength: 'La contraseña debe tener al menos 8 caracteres.'
          }
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
  </script>

@endsection
