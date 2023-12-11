<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "nombre" => "required|string|min:3|max:40",
            "precio_unitario" => "required|numeric|min:0|max:99999",
            "cantidad_disponible" => "required|numeric|min:0|max:99999"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view("articulo_index", ["articulos" => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articulo_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Articulo::create($request->all());
        return redirect()->route("articulos.index")->with(["message" => "Artículo creado exitosamente"]);
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
        $articulo = Articulo::find($id);
        return view("articulo_edit", ["articulo" => $articulo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $articulo = Articulo::find($id);
        $articulo->update($request->all());
        return redirect()->route("articulos.index")->with(["message" => "Artículo actualizado exitosamente"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect()->route("articulos.index")->with(["message" => "Artículo eliminado exitosamente"]);
    }
}
