@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - {{$curso->titulo}}  </title>
@endsection
@extends('layouts.navbar')

@section('content')

<div class="home">
  <div class="modal img-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 modal-image">
            <video src="{{ asset('storage').'/'.$curso->video }}" type="video/mp4" class="fotos-thumb" alt="user1" width="320" height="240" controls> </video>
          </div>
          <div class="col-md-4 modal-meta">
            <div class="modal-meta-top">
              <div class="img-poster clearfix">
                <strong>{{$curso->titulo}}</strong>
                <p>{{$curso->leccion}}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
