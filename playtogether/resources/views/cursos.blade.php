@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Cursos  </title>
@endsection
@extends('layouts.navbar')

@section('content')

@if ($user->email === 'admin@playtogether.com')

@if($ccursos <= 0)
  <div class="home">
    <div class="titulo">
          <h3 class="titulo_home">No hay más cursos disponibles</h3>
    </div>
    </div>
    @else
    <div class="home">
    <div class="titulo">
          <h3 class="titulo_home">Cursos disponibles:</h3>
    </div>

    <!--SLIDER INICIO-->
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
         @foreach ($cursos as $curso)
            <div class="fotos-card" style="height: 384px;">
            <a href="#">
                <img src="{{ asset('storage').'/'.$curso->foto }}" class="card-img-top" alt="imagenPublicacion">
            </a>
              <div class="card-body">
              <a href="{{route('perfil', $curso->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->nombre_user}}</h5>
              </a>
              <a href="{{route('pago')}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->titulo}}</h5>
                <p class="card-text"style="color:#fff">{{$curso->descripcion}}</p>
              </a>
                <p class="card-text"style="color:#fff">Precio: {{$curso->precio}}€</p>
                </div>
                <form action="{{route('borrarcurso')}}" method="post">
                <input type="hidden" name="id" value="{{ $curso->id}}">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" style="position:relative;left:57px; bottom: 11px"  class="btn btn-danger m-4" onclick="return confirm('¿Quieres borrar este curso?')">Borrar</button>
                    </form>
              </div>
          @endforeach
      </div>
    </section>
</div>
    @endif

@else
<div class="home">
    @if($ccursos <= 0)
    <div class="titulo">
          <h3 class="titulo_home">No hay más cursos disponibles</h3>
    </div>
    @else
    <div class="titulo">
          <h3 class="titulo_home">Accede a los cursos disponibles:</h3>
    </div>
    @endif
    <!--SLIDER INICIO-->
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
         @foreach ($cursos as $curso)
            <div class="fotos-card" style="height: 384px;">
            <a href="#">
                <img src="{{ asset('storage').'/'.$curso->foto }}" class="card-img-top" alt="imagenPublicacion">
            </a>
              <div class="card-body">
              <a href="{{route('perfil', $curso->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->nombre_user}}</h5>
              </a>
              <a href="{{route('pago')}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->titulo}}</h5>
                <p class="card-text"style="color:#fff">{{$curso->descripcion}}</p>
              </a>
                <p class="card-text"style="color:#fff">Precio: {{$curso->precio}}€</p>
                </div>
                <form action="{{ route('procesar.pago') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id_curso" value="{{ $curso->id }}">
                  <script
                      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                      data-key="{{ env('STRIPE_KEY') }}"
                      data-amount="{{$curso->precio * 100}}"
                      data-name="{{$curso->titulo}}"
                      data-description="{{$curso->descripcion}}"
                      data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                      data-locale="auto"
                      data-currency="eur">
                  </script>
              </form>
              </div>
          @endforeach
      </div>
    </section>
    <div class="titulo">
          <h3 class="titulo_home">Accede a los cursos comprados:</h3>
    </div>
    <!--SLIDER INICIO-->
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
         @foreach ($cursos_comprados as $curso)
            <div class="fotos-card" style="height: 384px;">
            <a href="{{route('curso_single', $curso->id_curso)}}">
                <img src="{{ asset('storage').'/'.$curso->foto }}" class="card-img-top" alt="imagenPublicacion">
            </a>
              <div class="card-body">
              <a href="{{route('perfil', $curso->id_user)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->nombre_user}}</h5>
              </a>
              <a href="{{route('curso_single', $curso->id_curso)}}" style="text-decoration:none">
                <h5 class="card-title" >{{$curso->titulo}}</h5>
                <p class="card-text"style="color:#fff">{{$curso->descripcion}}</p>
              </a>
                </div>
              </div>
          @endforeach
      </div>
    </section>
    <div class="titulo">
          <h3 class="titulo_home">Crea tus propios curos:</h3>
    </div>
    <div class="container-fluid justify-content-center d-flex align-items-sm-center">
    <a href={{route('crearcurso')}}><button class="btn-crear">Crear</button></a>
    </div>
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
@endif
@endsection
