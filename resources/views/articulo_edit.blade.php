@extends("layout")

@section("content")

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Editar artículo
            </div>
            <div class="card-body">
                <form action="{{route("articulos.update", [$articulo])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{old("nombre", $articulo->nombre)}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="precio_unitario">Precio unitario</label>
                        <input type="number" name="precio_unitario" id="precio_unitario"
                               value="{{old("precio_unitario", $articulo->precio_unitario)}}"
                               class="form-control" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad_disponible">Cantidad disponible</label>
                        <input type="number" name="cantidad_disponible" id="cantidad_disponible"
                               value="{{old("cantidad_disponible", $articulo->cantidad_disponible)}}" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("articulos.index")}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
