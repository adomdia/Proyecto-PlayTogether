@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

<div class="home">

  <div class="titulo">
    <span class="text nav-text">Solicitudes de amistad:</span>
  </div>






    <!--SLIDER INICIO-->
  <div class="titulo">
    <span class="text nav-text">Encuentra gente en tu circulo:</span>
  </div>
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @foreach ($usuarios as $usuario)
          @if($usuario->id != $user->id)
            <div class="fotos-card">
              <div class="fotos-image">
                <a href="media/img/user1.jpg">
                  <picture>
                    <img src="img/user0.jpg" class="fotos-thumb" alt="user1">
                  </picture>
                </a>
              </div>
              <div class="fotos-info">
                <div class="fotos-header">
                  <h2 class="fotos-user">{{$usuario->name}} </h2>
                </div>
                <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
                <div class="button">
                  <form method="post" action="{{route('crearsolicitud')}}">
                   @csrf
                    <input type="hidden" name="user_1" value="{{ $user->id}}">
                    <input type="hidden" name="user_2" value="{{ $usuario->id }}">
                    <button type="summit" class="btn btn-primary" style="border-color: #2d2196; background-color: #2d2196; color: #fff">Añadir amigo</a>


                  </form>
                </div>
              </div>
            </div>
          @endif
        @endforeach
        <!-- <div class="fotos-card">
          <div class="fotos-image">
            <a href="media/img/user2.jpg">
              <picture>
                <img src="img/user0.jpg" class="fotos-thumb" alt="user2">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">USER2</h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
            <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
          </div>
        </div>
        <div class="fotos-card">
          <div class="fotos-image">
            <a href="media/img/user3.jpg">
              <picture>
                <img src="img/user0.jpg" class="fotos-thumb" alt="user3">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">USER3</h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
            <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
          </div>
        </div>
        <div class="fotos-card">
          <div class="fotos-image">
            <a href="media/img/user4.jpg">
              <picture>
                <img src="img/user0.jpg" class="fotos-thumb" alt="user4">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">USER4</h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
            <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
          </div>
        </div>
        <div class="fotos-card">
          <div class="fotos-image">
            <a href="media/img/user5.jpg">
              <picture>
                <img src="img/user0.jpg" class="fotos-thumb" alt="user5">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">USER5</h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
            <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
          </div>
        </div>
        <div class="fotos-card">
          <div class="fotos-image">
            <a href="media/img/user5.jpg">
              <picture>
                <img src="img/user0.jpg" class="fotos-thumb" alt="user5">
              </picture>
            </a>
          </div>
          <div class="fotos-info">
            <div class="fotos-header">
              <h2 class="fotos-user">USER5</h2>
              <div class="fotos-icon">
                <i class='bx bx-heart like'></i>
                <i class='bx bx-comment-dots comment'></i>
              </div>
            </div>
            <p class="fotos-short-description">ASASDASDASDASDASDASDAS</p>
          </div>
        </div> -->
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
