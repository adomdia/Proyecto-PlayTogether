@extends('layouts.app')@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - Crear Curso  </title>
@endsection
@extends('layouts.navbar')

@section('content')
<form action="{{ route('createcurso') }}" id="form_curso"  method="post" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="user_id" value="{{ $user->id }}">
  <input type="hidden" name="user_name" value="{{ $user->name }}">
  <input type="hidden" name="user_foto" value="{{ $user->foto }}">
  <div class="container border text-center formulario_creacion" style="margin: 150px auto;
          max-width: 400px;
          font-weight: 300;
          background-color: #fff;
          border-radius: 15px;
          padding: 20px;">
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
          <input type="text" name="descripcion" id="descripcion"  require>
      </div>
      <div class="form-group p-2">
          <label for="Foto">
              Añade un video:
          </label>
          <input type="file" name="archivo" id="archivo" style="width:75%"  require>
      </div>
      <div class="form-group p-2">
          <label for="Foto">
              Lección:
          </label>
          <textarea rows="5" cols="40" name="leccion" id="leccion" style="width:75%; height:100px" require> </textarea>
      </div>
      <div class="form-group p-2">
          <label for="Precio">
              Precio:
          </label>
          <input type="float" name="precio" id="precio" max-value="5" min-value="0" require>
      </div>


      <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
  $('#form_curso').validate({
    rules: {
      descripcion: 'required',
      titulo: 'required',
      leccion: 'required',
      precio: {
        required: true,
        number: true
      },
      archivo: 'required'
    },
    messages: {
      descripcion: 'Por favor, ingresa una descripción.',
      titulo: 'Por favor, ingresa un título.',
      leccion: 'Por favor, ingresa una lección.',
      precio: {
        required: 'Por favor, ingresa una cantidad.',
        number: 'Por favor, ingresa un valor numérico.'
      },
      archivo: 'Por favor, selecciona un archivo.'
    },
    submitHandler: function(form) {
                form.submit();
        };
    });})
</script>
@endsection
