@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

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
                <img class="img-circle" style="width:" src="img/user0.jpg"/>
                <strong>{{$owner->name}}</strong>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="img/user0.jpg">
                    </div>
                    <div class="comment-text">
                      <strong>
                      {{$comentario->user_name}}
                      </strong>
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
              <img class="img-circle" style="width:" src="img/user0.jpg"/>
                <strong>{{$owner->name}}</strong>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="img/user0.jpg">
                    </div>
                    <div class="comment-text">
                      <strong>
                      {{$comentario->user_name}}
                      </strong>
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
              <img class="img-circle" style="width:" src="img/user0.jpg"/>
                <strong>{{$owner->name}}</strong>
                <strong>{{$publicacion->titulo}}</strong>
                <p>{{$publicacion->descripcion}}</p>
              </div>
              <ul class="img-comment-list">
                @foreach ($comentarios as $comentario)
                  <li>
                    <div class="comment-img">
                      <img src="img/user0.jpg">
                    </div>
                    <div class="comment-text">
                      <strong>
                      {{$comentario->user_name}}
                      </strong>
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

@endsection
@section('javascript')
<script src="{{ asset('resources/js/app.js') }}" defer></script>
@endsection
