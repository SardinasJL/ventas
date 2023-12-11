<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = "ventas";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relDetalle()
    {
        return $this->hasMany(Detalle::class, "ventas_id", "id");
    }
}
