<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
    use HasFactory;
   
    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion');
    }
    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }
}
