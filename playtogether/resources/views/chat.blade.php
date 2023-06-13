@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Chat  </title>
@endsection
@extends('layouts.navbar')

@section('content')
<div class="home">

    <div class="container" style="margin-top:10vh;width:100%;max-height:85%;overflow:scroll">
        <div class="row chat">
          <div class="col-lg-9 mb-3" style="width:75%;">
            @if ($cmensaje > 0)
              @foreach ($mensajes as $mensaje)
                @if ($mensaje->user_send == $user->id)
                  <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0" style="position: relative;
                                                                                                                                                      right: -17vw;">
                    <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                        <h5>
                        {{$mensaje->user_send_name}}
                        </h5>
                        <span>
                          {{$mensaje->text}}
                        </span>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                    <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                        <h5>
                        {{$mensaje->user_send_name}}
                        </h5>
                        <span>
                          {{$mensaje->text}}
                        </span>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            @endif
          </div>
        </div>
          <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0" style="width:100%">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                   Enviar mensaje:
                  </h5>
                  <form action="{{route('enviarMensaje')}}" method="post">
                      <input type="hidden" name="recive" value="{{ $recive->id}}">
                      <input type="hidden" name="send" value="{{ $user->id}}">
                      <input type="hidden" name="user_name" value="{{ $user->name}}">
                      <input type="hidden" name="user_foto" value="{{ $user->foto}}">
                          @csrf
                          <input class="form-mensaje" type="text" name="mensaje" placeholder="Enviar mensaje..."></div>
                        <button type="submit" style="position:relative;left:0px; width:50%"  class="btn btn-primary m-4">Enviar</button>
                    </form>
                </div>
                  </div>
                </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form_mensaje').validate({
            rules: {
                mensaje: 'required',
            },
            messages: {
                mensaje: 'Por favor, introduce un mensaje',

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection
