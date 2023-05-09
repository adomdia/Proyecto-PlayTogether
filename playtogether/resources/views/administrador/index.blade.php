@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

<div class="home">
    <!--SLIDER INICIO-->
    <section class="fotos">
      <i class="bx bx-chevron-left arrow left"></i>
      <button class="pre-btn"></button>
      <i class="bx bx-chevron-right arrow right"></i>
      <button class="nxt-btn"></button>
      <div class="fotos-container">
        @foreach ($usuarios as $usuario)
        @if ($usuario->email != 'admin@admin.com')
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
                <h2 class="fotos-user">{{$usuario->email}}</h2>
              </div>
              <p class="fotos-short-description">{{$usuario->name}}</p>
              <p class="fotos-short-description">{{$usuario->l_name}}</p>
            </div>
          </div>
          @endif
          @endforeach
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
