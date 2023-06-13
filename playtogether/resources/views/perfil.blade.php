@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - {{$usuario->name}} {{$usuario->l_name}}  </title>
@endsection
@extends('layouts.navbar')

@section('content')

@if ($user->email === 'admin@playtogether.com')

<div class="home">
        <div class="titulo">
          <span class="image">
            <img src="{{ asset('storage').'/'.$usuario->foto }}" style="width: 75%;
                                                                        max-width: 150px;
                                                                        border-radius: 25px;" alt="user_img">
          </span>

          <h1 class="titulo_home">{{$usuario->name}} {{$usuario->l_name}}</h1>
        </div>

        <div class="titulo">
        <h1 class="titulo_home">Publicaciones de este usuario:</h1>
        </div>
        <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
         @foreach ($publicaciones as $publicacion)
         @if ($publicacion->tipo == 'Foto')
            <div class="fotos-card" style="height: 325px;">
            <a href="{{route('publicaciones.show', $publicacion->id)}}">
                <img src="{{ asset('storage').'/'.$publicacion->archivo }}" class="card-img-top" alt="imagenPublicacion">
            </a>
              <div class="card-body">
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text"style="color:#fff">{{$publicacion->descripcion}}</p>
                <form action="{{route('borrarpublicacion')}}" method="post">
                <input type="hidden" name="id" value="{{ $publicacion->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar esta publicación?')">Borrar</button>
                    </form>
                </div>
              </div>
            @elseif ($publicacion->tipo == 'Video')
            <div class="fotos-card" style="height: 375px;">
            <video src="{{ asset('storage').'/'.$publicacion->archivo }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" style="height: 64%;" controls> </video>
              <div class="card-body">
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text"style="color:#fff">{{$publicacion->descripcion}}</p>
                <form action="{{route('borrarpublicacion')}}" method="post">
                <input type="hidden" name="id" value="{{ $publicacion->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar esta publicación?')">Borrar</button>
                    </form>
                </div>
              </div>
            @elseif($publicacion->tipo == 'Audio')
            <div class="fotos-card" style="height: 300px;">
                  <audio controls style="width:220px">
                            <source src="{{ asset('storage').'/'.$publicacion->archivo }}" class="fotos-thumb" alt="user1">
                  </audio>
              <div class="card-body">
                <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text" style="color:#fff">{{$publicacion->descripcion}}</p>
                <form action="{{route('borrarpublicacion')}}" method="post">
                <input type="hidden" name="id" value="{{ $publicacion->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar esta publicación?')">Borrar</button>
                    </form>
                </div>
              </div>

            @endif
          @endforeach
      </div>
    </section>
    <div class="titulo">
        <h1 class="titulo_home">Amigos:</h1>
        </div>
        <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
      @foreach ($amigos as $amigo)

        <div class="fotos-card">
          <div class="fotos-image">
            <a href="{{route('perfil', $amigo->id)}}">
              <picture>
                <img  src="{{ asset('storage').'/'.$amigo->foto }}" class="fotos-thumb" alt="user1">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">{{$amigo->name}} </h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </section>


@else

<div class="home">
        <div class="titulo">
          <span class="image">
            <img src="{{ asset('storage').'/'.$usuario->foto }}" style="width: 75%;
                                                                        max-width: 150px;
                                                                        border-radius: 25px;" alt="user_img">
          </span>

          <h1 class="titulo_home">{{$usuario->name}} {{$usuario->l_name}}</h1>
          @if ($user->id != $usuario->id)
          <a href={{route('chat', $usuario->id)}}><button class="btn-crear" style="width: 150px;">Enviar Mensaje</button></a>
          @endif
        </div>

        <div class="titulo">
        <h1 class="titulo_home">Publicaciones de este usuario:</h1>
        </div>
        <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
         @foreach ($publicaciones as $publicacion)
         @if ($publicacion->tipo == 'Foto')
            <div class="fotos-card" style="height: 325px;">
            <a href="{{route('publicaciones.show', $publicacion->id)}}">
                <img src="{{ asset('storage').'/'.$publicacion->archivo }}" class="card-img-top" alt="imagenPublicacion">
            </a>
              <div class="card-body">
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text"style="color:#fff">{{$publicacion->descripcion}}</p>
                </div>
              </div>
            @elseif ($publicacion->tipo == 'Video')
            <div class="fotos-card" style="height: 375px;">
            <video src="{{ asset('storage').'/'.$publicacion->archivo }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" style="height: 64%;" controls> </video>
              <div class="card-body">
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text"style="color:#fff">{{$publicacion->descripcion}}</p>
                </div>
              </div>
            @elseif($publicacion->tipo == 'Audio')
            <div class="fotos-card" style="height: 300px;">
                  <audio controls style="width:220px">
                            <source src="{{ asset('storage').'/'.$publicacion->archivo }}" class="fotos-thumb" alt="user1">
                  </audio>
              <div class="card-body">
                <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->nombre_user}}</h5>
              </a>
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text" style="color:#fff">{{$publicacion->descripcion}}</p>

                </div>
              </div>

            @endif
          @endforeach
      </div>
    </section>
    <div class="titulo">
        <h1 class="titulo_home">Amigos:</h1>
        </div>
        @if ($cAmigos == 0)

        <div class="titulo">
          <h1 class="titulo_home">¿Todavía no tienes ningún contacto?</h1>
          <p><h3  class="titulo_home" >Conecta con otros usuarios de la plataforma</h3></p>
        </div>
        <div class="container-fluid justify-content-center d-flex align-items-sm-center">
          <a href={{route('usuarios')}}><button class="btn-crear" style="width:150px">Ver usuarios</button></a>
        </div>
        @else
        <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
      @foreach ($amigos as $amigo)

        <div class="fotos-card">
          <div class="fotos-image">
            <a href="{{route('perfil', $amigo->id)}}">
              <picture>
                <img  src="{{ asset('storage').'/'.$amigo->foto }}" class="fotos-thumb" alt="user1">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">{{$amigo->name}} </h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </section>
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
      @endif
      @endsection
