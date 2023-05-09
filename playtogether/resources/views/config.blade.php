@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<input type="hidden" name="id" value="{{ $user->id }}">
<div class="home">
    <nav class="conf-bar" style="z-index:8">
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
                  <a href="{{ route('publicaciones') }}">
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
                    <form method="post" action="{{ route('modificaruser') }}" style="max-width: 60vw;
                                                        margin-left: 10vw;">
                        @csrf
                        <input type="hidden" name="id_user" value="{{ $user->id }}">

                        <div class="formconfig mb-3" style="margin-left:15vw">
                            <label for="name" class=" form-label text-md-end">{{ __('Cambiar Nombre') }}</label>

                            <div class="col-md-6" >
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user->name)?$user->name:''  }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="formconfig mb-3" style="margin-left:15vw">

                            <label for="l_name" class="form-label text-md-end">{{ __('Cambiar Apellido') }}</label>
                            <div class="col-md-6">
                                <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ isset($user->l_name)?$user->l_name:''  }}" required autocomplete="l_name" autofocus>

                                @error('l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <div class="row mb-3">
@endsection
