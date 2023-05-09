@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<form action="{{ route('crearpublicacion') }}" method="post" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="id_user" value="{{ $user->id }}">
  <div class="container border text-center" style="margin: 150px auto;
          max-width: 400px;
          font-weight: 300;
          background-color: #fff;
          border-radius: 15px;
          padding: 20px;">
      <div class="form-group p-2">
      <select name="tipo" class="d-flex form-control me-2" style="background-color: #000; color: #fff">
            <option>Seleccione un tipo</option>
            <option>Foto</option>
            <option>Audio</option>
            <option>Video</option>
          </select>
      </div>
      <div class="form-group p-2">
          <label for="Título">
              Título:
          </label>
          <input type="text" name="titulo" id="titulo"   require>
      </div>
      <div class="form-group p-2">
          <label for="Descripcion">
              Descripción:
          </label>
          <input type="textarea" name="descripcion" id="descripcion" require>
      </div>
      <div class="form-group p-2">
          <label for="Foto">
              Archivo:
          </label>
          <input type="file" name="archivo" id="archivo" require>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>
@endsection
