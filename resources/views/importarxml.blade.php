@extends('welcome')

@section('content')
<div class="col-md-12">
<form action="{{route('tratamientoxml')}}" method="post" enctype="multipart/form-data">
    @csrf
 <div class="card">
   <div class="card-header">Importar archivos XML</div>
    <div class="card-body">
      <h5 class="card-title">Solo pueden importar archivos XML</h5>
      <br><br>
      <input type="file" name="archivossubidos[]" multiple>
      <br><br>
      <button class="btn btn-success" type="submit">Importar XML</button>
    </div>
 </div>
</form>
</div>

@endsection