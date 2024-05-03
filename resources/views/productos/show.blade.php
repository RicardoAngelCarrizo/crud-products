@extends('app')

@section('content')
    <div class="row">
        <div class="mb-3 col-lg-12">
        <label for="codigo" class="form-label">Codigo</label>
        <span class="form-control bg-light" id="codigo">{{ $data->codigo }}</span>
        </div>
        <div class="mb-3 col-lg-6">
        <label for="descripcion" class="form-label">Descripción</label>
        <span class="form-control bg-light" id="descripcion">{{ $data->descripcion }}</span>
        </div>
        <div class="mb-3 col-lg-6">
        <label for="precio" class="form-label">Precio</label>
        <span class="form-control bg-light" id="precio">{{ $data->precio }}</span>
        </div>
        <div class="mb-3 col-lg-12">
        <label for="stock" class="form-label">Stock</label>
        <span class="form-control bg-light" id="stock">{{ $data->stock }}</span>
        </div>
    
    </div>
  <a href="{{ route('productos.edit', $data->id) }}" class="btn btn-success" >Editar registro</a>
  <a href="{{ route('productos.store') }}" class="btn btn-primary" >Volver a la lista</a>
@endsection