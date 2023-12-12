<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Detalle;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "cantidad" => "required|numeric|min:1",
            "articulos_id" => "required|numeric|min:1",
            "ventas_id" => "required|numeric|min:1"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($idVenta)
    {
        $venta = Venta::find($idVenta);
        return view("detalle_index", ["venta" => $venta]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($idVenta)
    {
        $venta = Venta::find($idVenta);
        $articulos = Articulo::all();
        return view("detalle_create", ["venta" => $venta, "articulos" => $articulos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $idVenta)
    {
        $request["ventas_id"] = $idVenta;
        $this->validarForm($request);
        Detalle::create($request->all());
        return redirect()->route("ventas.detalles.index", [$idVenta])->with(["message" => "Ítem añadido exitosamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $idVenta, int $idDetalle)
    {
        $venta = Venta::find($idVenta);
        $detalle = Detalle::find($idDetalle);
        $articulos = Articulo::all();
        return view("detalle_edit", ["venta" => $venta, "detalle" => $detalle, "articulos" => $articulos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $idVenta, int $idDetalle)
    {
        $request["ventas_id"] = $idVenta;
        $this->validarForm($request);
        $detalle = Detalle::find($idDetalle);
        $detalle->update($request->all());
        return redirect()->route("ventas.detalles.index", [$idVenta])->with(["message" => "Ítem editado exitosamente"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $idVenta, int $idDetalle)
    {
        $detalle = Detalle::find($idDetalle);
        $detalle->delete();
        return redirect()->route("ventas.detalles.index", [$idVenta])->with(["message" => "Ítem eliminado exitosamente"]);
    }
}
