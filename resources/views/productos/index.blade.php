@extends ('app')

@section ('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-lg-9 col-md-6">
                Lista de productos
            </div>
            <div class="col col-lg-3 col-md-6">
                <a href="productos/create" class="btn btn-primary">Nuevo producto</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($data)>0)
                @foreach($data as $row)
                <tr>
                    <th scope="row"><a href="{{ route('productos.show', $row->id) }}">{{ $row->codigo }}</a></th>
                    <td>{{ $row->descripcion }}</td>
                    <td>{{ $row->precio }}</td>
                    <td>{{ $row->stock }}</td>
                    
                    <td>
                        <a href="{{ route('productos.edit',$row->id) }}"><i class="bi bi-pen"></i></a>&nbsp;
                        <a href="#"
                            onclick="document.getElementById('delete-form-{{ $row->id }}').submit();">
                            <i class="bi bi-trash"></i>
                        </a>

                        <form id="delete-form-{{ $row->id }}" action="{{ route('productos.destroy', ['id' => $row->id]) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No existen productos registrados</td>
                </tr>
                @endif
            </tbody>
        </table>
       {!! $data->links() !!}
    </div>
</div>
@endsection