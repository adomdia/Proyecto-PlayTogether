@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - {{$publicacion->titulo}}  </title>
@endsection
@extends('layouts.navbar')

@section('content')
@section('content')
@if ($user->email === 'admin@playtogether.com')

<div class="home">
  @if($publicacion->tipo === 'Foto')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
            <img class="img-responsive " style="width:100%;height:auto" src="{{ asset('storage').'/'.$publicacion->archivo }}">
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
                <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
                <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                      <form action="{{route('borrarcomentario')}}" method="post">
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      @csrf
                      {{ method_field('DELETE') }}
                          <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este comentario?')">Borrar</button>
                    </form>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @elseif ($publicacion->tipo === 'Video')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
            <video src="{{ asset('storage').'/'.$publicacion->archivo }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" controls> </video>
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
              <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                      <form action="{{route('borrarcomentario')}}" method="post">
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      @csrf
                      {{ method_field('DELETE') }}
                          <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este comentario?')">Borrar</button>
                    </form>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif ($publicacion->tipo === 'Audio')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
          <audio controls>
                            <source src="{{ asset('storage').'/'.$publicacion->archivo }}" class="fotos-thumb" alt="user1">
                  </audio>
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
              <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                    <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                      <form action="{{route('borrarcomentario')}}" method="post">
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      @csrf
                      {{ method_field('DELETE') }}
                          <button type="submit" style="position:relative;left:57px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este comentario?')">Borrar</button>
                    </form>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  @endif

</div>

@else
<div class="home">
  @if($publicacion->tipo === 'Foto')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
            <img class="img-responsive " style="width:100%;height:auto" src="{{ asset('storage').'/'.$publicacion->archivo }}">
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
                <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
                <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @elseif ($publicacion->tipo === 'Video')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
            <video src="{{ asset('storage').'/'.$publicacion->archivo }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" controls> </video>
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
              <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif ($publicacion->tipo === 'Audio')
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
          <audio controls>
                            <source src="{{ asset('storage').'/'.$publicacion->archivo }}" class="fotos-thumb" alt="user1">
                  </audio>
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
              <img class="img-circle" style="width:" src="{{ asset('storage').'/'.$owner->foto }}"/>
              <a href="{{route('perfil', $publicacion->id_user)}}" style="text-decoration:none">
                <strong>{{$owner->name}}</strong>
              </a>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="{{ asset('storage').'/'.$comentario->user_foto }}">
                    </div>
                    <div class="comment-text">
                    <a href="{{route('perfil', $comentario->id_user)}}" style="text-decoration:none">
                    <strong>
                      {{$comentario->user_name}}
                      </strong>
                      </a>
                      <p>{{$comentario->texto}}</p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="modal-meta-bottom">
            <form action="{{ route('crearcomentario') }}" method="post" enctype="multipart/form-data">
               @csrf
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
              <input type="text" class="form-control" name="texto" placeholder="Escribe tu comentario..."/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  @endif

</div>

@endif
@endsection
@section('javascript')
<script src="{{ asset('resources/js/app.js') }}" defer></script>
@endsection
