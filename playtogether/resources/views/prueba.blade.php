@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5 ">
    <div class="row w-75 position-absolute top-50 start-50 translate-middle">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Registrate de manera gratuita') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="form-sigup">
                        @csrf
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="l_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                                    @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
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
                            <label for="l_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
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


    {{-- <div class="row">
        <div class="container col-md-6">
            <form action="" class="form-signup">
                <h5 style="font-family: 'Russo One', sans-serif;">Registrate de manera gratuita</h5 >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Dirección email</label>
                    <input type="email" class="form-control" placeholder="Introduce tu dirección email">
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Introduzca una contraseña">
                </div>
                <div class="form-group">
                    <label class="form-label">Repita la contraseña</label>
                    <input type="email" class="form-control" placeholder="Introduzca la contraseña de nuevo">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" style="margin-top: 20px; background-color: #2d2196" type="button">Registrar</button>
                </div>
            </form>
        </div>


        <div class="container col-md-6">
            <form action="" class="form-signup">
                <h5 style="font-family: 'Russo One', sans-serif;">Usuarios ya registrados</h5 >
                <div class="form-group">
                    <label class="form-label">Dirección de correo</label>
                    <input type="text" class="form-control" placeholder="Dirección de correo">
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Introduzca una contraseña">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" style="margin-top: 20px; background-color: #2d2196" type="button">Entrar</button>
                </div>
            </form>
        </div>
    </div> --}}

@endsection