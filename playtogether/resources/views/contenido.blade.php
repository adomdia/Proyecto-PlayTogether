@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Contenido  </title>
@endsection
@extends('layouts.navbar')

@section('content')

@if ($user->email === 'admin@admin.com')

<div class="home">
        <div class="titulo">
          <h1 class="titulo_home">Estás en la vista de administrador, pulsa el siguiente botón para continuar con la administración de la página.</h1>
          <div class="container-fluid justify-content-center d-flex align-items-sm-center">
            <a href={{route('indexadministrar')}}><button class="btn-crear">Continuar</button></a>
          </div>
        </div>
</div>


@else
  <div class="home">
    <!--SLIDER INICIO-->
    <section class="grupos" >
      <div class="grupos-container">
        <div class="grupos-card">
          <div class="grupos-image">
          <a href="{{route('cursos')}}">
              <picture>
                <img src="img/grupos1.jpg" class="grupos-thumb" alt="grupos1">
              </picture>
            </a>
          </div>
          <div class="grupos-info">
            <div class="grupos-header">
              <h2 class="grupos-name">Cursos </h2>
            </div>
            <p class="grupos-short-description">Apartado especializado en ofrecer clases de todo tipo de instrumentos, así como de solfeo. Encuentra al usuario
              que más se acerque a tus necesidades y disfruta de su contenido.
            </p>
            <div class="button">
            <a href="{{route('cursos')}}">Acceder</a>
          </div>
          </div>
        </div>
        <div class="grupos-card">
          <div class="grupos-image">
          <a href="{{route('foros')}}">
              <picture>
                <img src="img/grupos2.jpg" class="grupos-thumb" alt="grupos2">
              </picture>
            </a>
          </div>
          <div class="grupos-info">
            <div class="grupos-header">
              <h2 class="grupos-name">Tips </h2>
            </div>
            <p class="grupos-short-description">Aquí podrás acceder a todo tipo de conocimientos y consejos rutinarios. Toda la experiencia de los usuarios, aglutinado para
              facilitar el aprendizaje, optimizar tus conocimiento, etc.
            </p>
            <div class="button">
            <a href="{{route('foros')}}">
            Acceder</a>
          </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endif
@endsection
