@extends('welcome')

@section('content')
<div class="col-md-12">
 <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Importar Excel</button>
            </form>
</div>

@endsection