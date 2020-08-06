@extends('welcome')

@section('content')
<div class="col-md-12">

 <div class="card">
   <div class="card-header">Acciones</div>
    <div class="card-body">
      <a class="btn btn-primary" href="{{ route('export') }}">Exportar inventario</a>
      <a class="btn btn-success" href="{{ route('importarxml') }}">Añadir más XML</a>
      <a class="btn btn-danger" href="{{ route('limpiarbase') }}">Limpiar Inventario</a>
    </div>
 </div>
</div>

@endsection