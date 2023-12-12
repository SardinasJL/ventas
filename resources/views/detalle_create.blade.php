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
                Nuevo detalle
            </div>
            <div class="card-body">
                <form action="{{route("ventas.detalles.store", [$venta])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control"
                               value="{{old("cantidad")}}">
                    </div>
                    <div class="mb-3">
                        <label for="articulos_id">Articulo</label>
                        <select name="articulos_id" id="articulos_id" class="form-select">
                            @foreach($articulos as $articulo)
                                <option value="{{$articulo->id}}" {{old("articulos_id")==$articulo->id?"selected":""}}>
                                    {{$articulo->nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("ventas.detalles.index", [$venta])}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
