@extends("layout")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{session("danger")?"danger":"success"}}">
            {{session("message")}}
        </div>
    @endif

    @php
        $total = 0;
    @endphp

    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Detalle de la venta {{$venta->id}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>
                                <a href="{{route("ventas.detalles.create", [$venta])}}"
                                   class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($venta->relDetalle as $detalle)
                            <tr>
                                <td>{{$detalle->id}}</td>
                                <td>{{$detalle->relArticulo->nombre}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{$detalle->relArticulo->precio_unitario}}</td>
                                <td>{{$detalle->cantidad * $detalle->relArticulo->precio_unitario}}</td>
                                @php
                                    $total += $detalle->cantidad * $detalle->relArticulo->precio_unitario
                                @endphp
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("ventas.detalles.edit", [$venta, $detalle])}}"
                                           class="btn btn-primary">Editar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$detalle->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$detalle->id}}" tabindex="-1"
                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar detalle</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar el detalle seleccionado? Esta acción no puede deshacerse.
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("ventas.detalles.destroy", [$venta, $detalle])}}"
                                                  method="post">
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
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$detalle->id}}" tabindex="-1"
                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar detalle</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar el registro seleccionado? Esta acción no puede deshacerse.
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("ventas.detalles.destroy", [$venta, $detalle])}}"
                                                  method="post">
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
                        <tfoot>
                        <tr>
                            <td colspan="6">Total: bs.{{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
