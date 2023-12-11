<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Articulo;
use App\Models\Detalle;
use App\Models\Venta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Venta::insert([
            ["fecha" => "2023-12-11"], ["fecha" => "2023-12-11"], ["fecha" => "2023-12-11"]
        ]);

        Articulo::insert([
            ["nombre" => "alicate 2\"", "cantidad_disponible" => 10, "precio_unitario" => 15.50],
            ["nombre" => "clavos 3/4\"", "cantidad_disponible" => 20, "precio_unitario" => 20.50],
            ["nombre" => "cable nº 14", "cantidad_disponible" => 2, "precio_unitario" => 80],
            ["nombre" => "fierro angular 1/2\"", "cantidad_disponible" => 5, "precio_unitario" => 80.50],
            ["nombre" => "electrodos 2mm", "cantidad_disponible" => 0, "precio_unitario" => 20]
        ]);

        Detalle::insert([
            ["cantidad" => 1, "ventas_id" => 1, "articulos_id" => 1],
            ["cantidad" => 1, "ventas_id" => 1, "articulos_id" => 2],
            ["cantidad" => 1, "ventas_id" => 1, "articulos_id" => 3],
        ]);
    }
}
