@extends("layout")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{session("danger")?"danger":"success"}}">
            {{session("message")}}
        </div>
    @endif

    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Ventas
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>
                                <a href="{{route("ventas.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ventas as $venta)
                            <tr>
                                <td>{{$venta->id}}</td>
                                <td>{{$venta->fecha}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("ventas.detalles.index", [$venta])}}" class="btn btn-success">Detalle</a>
                                        <a href="{{route("ventas.edit", [$venta])}}" class="btn btn-primary">Editar</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$venta->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$venta->id}}" tabindex="-1"
                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar venta</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar el registro seleccionado? Esta acción no puede deshacerse.
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("ventas.destroy", [$venta])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
