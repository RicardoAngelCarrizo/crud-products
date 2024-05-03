@extends('app')

@section('content')
<form method="POST" action="{{ route('productos.store') }}" enctype="application/x-www-form-urlencoded">
  @csrf
    <div class="row">
        <div class="mb-3 col-lg-12">
        <label for="codigo" class="form-label">Codigo</label>
        <input type="number" class="form-control" id="codigo" name="codigo" aria-describedby="codigoAyuda">
        <div id="codigoAyuda" class="form-text">Codigo</div>
        </div>
        <div class="mb-3 col-lg-6">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
        </div>
        <div class="mb-3 col-lg-6">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio">
        </div>
        <div class="mb-3 col-lg-12">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock">
        </div>
    
    
    </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection