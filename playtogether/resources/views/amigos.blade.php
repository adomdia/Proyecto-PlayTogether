@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Amigos  </title>
@endsection
@extends('layouts.navbar')

@section('content')
@if ($user->email === 'admin@playtogether.com')

<div class="home">
        <div class="titulo">
          <h1 class="titulo_home">Por seguridad el usuario admin no puede realizar interacciones de amistad</h1>
        </div>
</div>

@else
<div class="home">
@if ($cAmigos == 0)

<div class="titulo">
  <h1 class="titulo_home">¿Todavía no tienes ningún contacto?</h1>
  <p><h3  class="titulo_home" >Conecta con otros usuarios de la plataforma</h3></p>
</div>
<div class="container-fluid justify-content-center d-flex align-items-sm-center">
  <a href={{route('usuarios')}}><button class="btn-crear" style="width:150px">Ver usuarios</button></a>
</div>
@else
    <!--SLIDER INICIO-->
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @foreach ($usuarios as $usuario)
          @foreach ($amigos as $amigo)
          @if ($usuario->id == $amigo->user_2)
        <div class="fotos-card">
          <div class="fotos-image">
            <a href="{{route('perfil', $usuario->id)}}">
              <picture>
                <img  src="{{ asset('storage').'/'.$usuario->foto }}" class="fotos-thumb" alt="user1">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">{{$usuario->name}} </h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
          </div>
          <form method="post" action="{{route('eliminaramigo')}}">
            @csrf
            <input type="hidden" name="usuario_id" value="{{ $usuario->id}}">
            <button type="summit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff;position: relative;left: 51px;bottom: 14px;">Eliminar Amigo</a>
          </form>
        </div>
       @endif
       @endforeach
       @endforeach
      </div>
    </section>
    @endif
  </div>
@endif
<!-- <div class="container position-absolute top-50 start-50 translate-middle">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
