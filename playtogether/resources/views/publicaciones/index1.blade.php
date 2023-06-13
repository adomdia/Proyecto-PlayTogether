@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

<div class="home" style="margin:auto">
        <div class="titulo">
          <span class="text nav-text">Fotos:</span>
        </div>
          <div class="fotos-container">
            @if ($fotos === 0)
              <div class="container-fluid justify-content-center d-flex align-items-sm-center">
                <a href={{route('crear')}}><button style="width:250px" class="btn-crear">Sube tu primera foto</button></a>
              </div>
            @else
            @foreach ($publicaciones as $publicacion)
            @if ($publicacion->tipo == 'Foto')
            <div class="card" style="width: 18rem;">
              <a href="{{route('publicaciones.show', $publicacion->id)}}">
                <img src="{{ asset('storage').'/'.$publicacion->archivo }}" class="card-img-top" alt="imagenPublicacion">
              </a>
              <div class="card-body">
              <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                <h5 class="card-title" style="color:#000">{{$publicacion->titulo}}</h5>
                </a>
                <p class="card-text">{{$publicacion->descripcion}}</p>
                <form action="{{route('borrarpublicacion')}}" method="post">
                <input type="hidden" name="id" value="{{ $publicacion->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:67px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar estpubliccación?')">Borrar</button>
                    </form>
                </div>
              </div>
              @endif
              @endforeach
              @endif
            </div>

            <div class="titulo">
              <span class="text nav-text">Videos:</span>
            </div>
              <div class="fotos-container">
                @if ($video === 0)
                    <div class="container-fluid justify-content-center d-flex align-items-sm-center">
                      <a href={{route('crear')}}><button class="btn-crear" style="width:250px">Sube tu primer video</button></a>
                    </div>
                @else
                @foreach ($publicaciones as $publicacion)
                @if ($publicacion->tipo == 'Video')
                <div class="card" style="width: 18rem;">
                <video src="{{ asset('storage').'/'.$publicacion->archivo }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" controls> </video>
                  <div class="card-body">
                  <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                    <h5 class="card-title"  style="color:#000">{{$publicacion->titulo}}</h5>
                  </a>
                    <p class="card-text">{{$publicacion->descripcion}}</p>
                    <form action="{{route('borrarpublicacion')}}" method="post">
                    <input type="hidden" name="id" value="{{ $publicacion->id}}">
                        @csrf
                        {{ method_field('DELETE') }}
                            <button type="submit" style="position:relative;left:67px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar estpubliccación?')">Borrar</button>
                        </form>
                    </div>
                  </div>
                  @endif
                  @endforeach
                  @endif
                </div>

              <div class="titulo">
                <span class="text nav-text">Audios:</span>
              </div>
                <div class="fotos-container" style="max-height:500px;padding-bottom:100px">
                  @if ($audio === 0)
                      <div class="container-fluid justify-content-center d-flex align-items-sm-center">
                        <a href={{route('crear')}}><button class="btn-crear" style="width:250px">Sube tu primer audio</button></a>
                      </div>
                  @else
                  @foreach ($publicaciones as $publicacion)
                  @if ($publicacion->tipo == 'Audio')
                  <div class="card" style="width: 18rem;">
                  <audio controls>
                            <source src="{{ asset('storage').'/'.$publicacion->archivo }}" class="fotos-thumb" alt="user1">
                  </audio>
                    <div class="card-body">
                    <a href="{{route('publicaciones.show', $publicacion->id)}}" style="text-decoration:none">
                      <h5 class="card-title"  style="color:#000">{{$publicacion->titulo}}</h5>
                    </a>
                      <p class="card-text">{{$publicacion->descripcion}}</p>
                      <form action="{{route('borrarpublicacion')}}" method="post">
                      <input type="hidden" name="id" value="{{ $publicacion->id}}">
                          @csrf
                          {{ method_field('DELETE') }}
                              <button type="submit" style="position:relative;left:67px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar estpubliccación?')">Borrar</button>
                          </form>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                  </div>
          </div>
        </section>
      </div>


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
