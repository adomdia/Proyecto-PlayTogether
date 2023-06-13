@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Foro  </title>
@endsection
@extends('layouts.navbar')

@section('content')

<div class="home">
@if ($user->email === 'admin@playtogether.com')

        <div class="titulo">
          <div class="container"style="width:75%; max-width:850px; position:relative; right:5vw">
            <div class="intro">
                <h2 class="text-center titulo_home">Crear nuevos temas:</h2>
            </div>
            <form id="form_titulo" class="form-inline" action="{{ route('creartemaforo') }}" method="post">
            @csrf
                <div class="form-group mb-3" >
                  <input class="form-control" type="text" name="titulo" placeholder="Nuevo tema"></div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Crear </button></div>
            </form>
          </div>
        </div>
        <div class="titulo">
          <h1 class="titulo_home">Administrar los temas del foro:</h1>
        </div>
      <div class="container">
        <div class="row foros">
          <div class="col-lg-9 mb-3" style="width:100%">
            @foreach ($temas as $tema)
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                    <a href="{{route('temaforo.show', $tema->id)}}" class="text-primary">{{$tema->titulo}}</a>
                  </h5>
                </div>
                <div class="col-md-4 op-7">
                  <div class="row text-center op-7">
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i>
                    <form action="{{route('borrartemaforo')}}" method="post">
                      <input type="hidden" name="id" value="{{ $tema->id}}">
                          @csrf
                          {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:0px;"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este tema?')">Borrar</button>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
</div>
</div>
</div>

@else
  <div class="container" style="margin-top:10vh">
        <div class="row foros">
          <div class="col-lg-9 mb-3" style="width:100%">
            @foreach ($temas as $tema)
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                <h5>
                    <a href="{{route('temaforo.show', $tema->id)}}" class="text-primary">{{$tema->titulo}}</a>
                  </h5>
                </div>
                <div class="col-md-4 op-7">
                  <div class="row text-center op-7">
                    <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">256 Votes</span> </div>
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">251 Replys</span> </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
  </div>
@endif

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form_titulo').validate({
            rules: {
                titulo: 'required',
            },
            messages: {
                name: 'Please enter your name',

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection
