<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = "articulos";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relDetalle()
    {
        return $this->hasMany(Detalle::class, "articulos_id", "id");
    }
}
