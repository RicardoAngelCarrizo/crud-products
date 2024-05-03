@extends('app')

@section('content')
<form method="POST" action="{{ route('productos.update', $data->id) }}" 
  enctype="application/x-www-form-urlencoded">
  @csrf
  @method('PUT')
    <div class="row">
        <div class="mb-3 col-lg-12">
        <label for="codigo" class="form-label">Codigo</label>
        <input type="codigo" class="form-control" id="codigo" name="codigo" aria-describedby="codigoAyuda" value="{{ $data->codigo }}">
        <div id="codigoAyuda" class="form-text">Codigo</div>
        </div>
        <div class="mb-3 col-lg-6">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="descripcion" class="form-control" id="descripcion" name="descripcion" value="{{ $data->descripcion }}">
        </div>
        <div class="mb-3 col-lg-6">
        <label for="precio" class="form-label">Precio</label>
        <input type="precio" class="form-control" id="precio" name="precio" value="{{ $data->precio }}">
        </div>
        <div class="mb-3 col-lg-12">
        <label for="stock" class="form-label">Stock</label>
        <input type="stock" class="form-control" id="stock" name="direccion" value="{{ $data->stock }}">
        </div>  
    
    </div>
  <button type="submit" class="btn btn-primary">Enviar datos</button>
</form>
@endsection