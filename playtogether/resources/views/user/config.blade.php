@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="home">
    <nav class="conf-bar">
          <div class="conf-bar">
            <div class="conf">
              <ul class="conf-links">
                <li class="nav link">
                  <a href="#">
                    <i class='bx bx-pencil icon'></i>
                    <span class="text nav-text">Editar perfil</span>
                  </a>
                </li>
                <li class="nav link">
                  <a href="#">
                    <i class='bx bx-bell icon' ></i>
                    <span class="text nav-text">Publicaciones</span>
                  </a>
                </li>
                <li class="nav link">
                  <a href="#">
                    <i class='bx bx-lock icon' ></i>
                    <span class="text nav-text">Amigos</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="conf-form">
                    <form method="post" action={{route('user') }} style="max-width: 60vw;
                                                        margin-left: 10vw;">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cambiar Nombre') }}</label>

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
                            <label for="l_name" class="col-md-4 col-form-label text-md-end">{{ __('Cambiar Apellido') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Cambiar Email') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Cambiar Contraseña') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Cambio Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">
                                    {{ __('Modificar') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>

@endsection
