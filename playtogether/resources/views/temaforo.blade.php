@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

<div class="home">
@if ($user->email === 'admin@playtogether.com')
        <div class="titulo">
          <h1 class="titulo_home">Administrar los temas del foro:</h1>
        </div>
      <div class="container">
        <div class="row foros">
          <div class="col-lg-9 mb-3" style="width:100%">
            @foreach ($comentarios as $comentario)
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                    {{$comentario->comentario}}
                  </h5>
                  <p>{{$comentario->user_name}}</p>
                </div>
                <div class="col-md-4 op-7">
                  <div class="row text-center op-7">
                    <form action="{{route('upvotecomentarioforo')}}"method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                    <div class="col px-1"><button class="button-icon" type="submit" style="border: none;
                                                                        background-color: transparent;" >
                    <span><i class='bx bx-up-arrow'  ></i></span> </button> </div>
                    </form>
                    <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm" >{{$comentario->valoracion}}</span> </div>
                    <form action="{{route('downvotecomentarioforo')}}"method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                      <div class="col px-1"><button class="button-icon" type="submit" style="border: none;
                                                                        background-color: transparent;" >
                    <span><i class='bx bx-down-arrow'  ></i></span> </button> </div>
                    </form>
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i>
                    <form action="{{route('borrarcomentarioforo')}}" method="post">
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                          @csrf
                          {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:0px;"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este comentario?')">Borrar</button>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                   Comentar:
                  </h5>
                  <form action="{{route('comentar')}}" id="form_comentario" method="post">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                      <input type="hidden" name="user_id" value="{{ $user->id}}">
                      <input type="hidden" name="user_name" value="{{ $user->name}}">
                          @csrf
                          <input class="form-control" type="text" name="comentario" placeholder="Comentar..."></div>
                        <button type="submit" style="position:relative;left:0px; width:50%"  class="btn btn-primary m-4">Comentar</button>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
</div>

@else
  <div class="container" style="margin-top:10vh">
        <div class="row foros">
          <!-- Main content -->
          <div class="col-lg-9 mb-3" style="width:100%">
          @foreach ($comentarios as $comentario)
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                    {{$comentario->comentario}}
                  </h5>
                  <p>{{$comentario->user_name}}</p>
                </div>
                <div class="col-md-4 op-7">
                  <div class="row text-center op-7">
                    <form action="{{route('upvotecomentarioforo')}}"method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                    <div class="col px-1"><button class="button-icon" type="submit" style="border: none;
                                                                        background-color: transparent;" >
                    <span><i class='bx bx-up-arrow'  ></i></span> </button> </div>
                    </form>
                    <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm" >{{$comentario->valoracion}}</span> </div>
                    <form action="{{route('downvotecomentarioforo')}}"method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $comentario->id}}">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                      <div class="col px-1"><button class="button-icon" type="submit" style="border: none;
                                                                        background-color: transparent;" >
                    <span><i class='bx bx-down-arrow'  ></i></span> </button> </div>
                    </form>
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i>
                </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                   Comentar:
                  </h5>
                  <form action="{{route('comentar')}}" id="form_comentario" method="post">
                      <input type="hidden" name="tema_id" value="{{ $tema->id}}">
                      <input type="hidden" name="user_id" value="{{ $user->id}}">
                      <input type="hidden" name="user_name" value="{{ $user->name}}">
                          @csrf
                          <input class="form-control" type="text" name="comentario" placeholder="Comentar..."></div>
                        <button type="submit" style="position:relative;left:0px; width:50%"  class="btn btn-primary m-4">Comentar</button>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
@endif

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form_comentario').validate({
            rules: {
                comentario: 'required',
            },
            messages: {
                comentario: 'Por favor, introduce un comentario',

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection
