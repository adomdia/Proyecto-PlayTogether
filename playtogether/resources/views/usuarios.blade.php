@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Usuarios  </title>
@endsection
@extends('layouts.navbar')

@section('content')

@if ($user->email === 'admin@playtogether.com')

<div class="home">
        <div class="titulo">
          <h1 class="titulo_home">Usuarios de la plataforma:</h1>
        </div>
        <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @foreach ($usuarios as $usuario)
        @if ($usuario->name == "admin")
        @else
            <div class="fotos-card">
              <div class="fotos-image">
              <a href="{{route('perfil', $usuario->id)}}">
                  <picture>
                    <img src="{{ asset('storage').'/'.$usuario->foto }}" class="fotos-thumb" alt="user1">
                  </picture>
                </a>
              </div>
              <div class="fotos-info">
                <div class="fotos-header">
                  <h2 class="fotos-user">{{$usuario->name}} </h2>
                  <h2 class="fotos-user">{{$usuario->l_name}}</p>
                </div>
                <div class="button">
                  <form method="post" action="{{route('borrarusuario')}}">
                   @csrf
                    <input type="hidden" name="id_user" value="{{ $usuario->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:57px;bottom: 30px;"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este usuario?')">Borrar</button>
                  </form>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </section>
</div>


@else
<div class="home">


  <div class="titulo">
    <h1 class=" titulo_home">Solicitudes de amistad:</h1>
  </div>
  <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @if (sizeof($solicitudes) == 0)
        <p> No tienes solicitudes de amistad nuevas </p>
        @else
        @foreach ($solicitudes as $solicitud)
            <div class="fotos-card" style="height: 165px;">
              <div class="fotos-info">
                <div class="fotos-header">
                <a href="{{route('perfil', $solicitud->user_1)}}" style="text-decoration:none">
                  <h2 class="fotos-user">{{$solicitud->nombre_user_1}} </h2>
</a>
                </div>
                <div class="button btn-toolbar">
                  <div class="btn-group">
                  <form method="post" action="{{route('aceptarsolicitud')}}">
                    @csrf
                    <input type="hidden" name="solicitud_id" value="{{ $solicitud->id}}">
                    <input type="hidden" name="user_1" value="{{ $solicitud->user_1}}">
                    <input type="hidden" name="user_2" value="{{ $solicitud->user_2}}">
                    <input type="hidden" name="nombre_user_1" value="{{ $solicitud->nombre_user_1}}">
                    <input type="hidden" name="nombre_user_2" value="{{ $solicitud->nombre_user_2}}">
                    <button type="summit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">Aceptar</a>

                  </form>
                  </div>
                  <div class="btn-group " style="margin-left:64px">
                  <form method="post" action="{{route('rechazarsolicitud')}}">
                   @csrf
                    <input type="hidden" name="solicitud_id" value="{{ $solicitud->id}}">
                    <button type="summit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">Eliminar</a>
                  </form>
                </div>
                </div>
              </div>
            </div>
        @endforeach
        @endif
        </div>
    </section>




    <!--SLIDER INICIO-->
  <div class="titulo">
    <h1 class=" titulo_home">Encuentra gente en tu circulo:</h1>
  </div>
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @foreach ($usuarios as $usuario)
        @if ($usuario->name == "admin" || $usuario->id === $user->id)
        @else
            <div class="fotos-card">
              <div class="fotos-image">
              <a href="{{route('perfil', $usuario->id)}}">
                  <picture>
                  <img src="{{ asset('storage').'/'.$usuario->foto }}" class="fotos-thumb" alt="user">
                  </picture>
                </a>
              </div>
              <div class="fotos-info">
                <div class="fotos-header">
                  <h2 class="fotos-user">{{$usuario->name}} </h2>
                </div>
                <div class="button">
                  <form method="post" action="{{route('crearsolicitud')}}">
                   @csrf
                    <input type="hidden" name="user_1" value="{{ $user->id}}">
                    <input type="hidden" name="user_2" value="{{ $usuario->id }}">
                    <input type="hidden" name="nombre_user_1" value="{{ $user->name}}">
                    <input type="hidden" name="nombre_user_2" value="{{ $usuario->name }}">
                    <button type="summit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff;position:relative;left: 50px; ">Añadir amigo</a>


                  </form>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </section>

  </div>
@endif
@endsection
