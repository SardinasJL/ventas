<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "fecha" => "required|date"
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return view("venta_index", ["ventas" => $ventas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("venta_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Venta::create($request->all());
        return redirect()->route("ventas.index")->with(["message" => "Venta creada exitosamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta = Venta::find($id);
        return view("venta_edit", ["venta" => $venta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $venta = Venta::find($id);
        $venta->update($request->all());
        return redirect()->route("ventas.index")->with(["message" => "Venta actualizada exitosamente"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = Venta::find($id);
        $venta->delete();
        return redirect()->route("ventas.index")->with(["message" => "Venta eliminada exitosamente"]);
    }
}
