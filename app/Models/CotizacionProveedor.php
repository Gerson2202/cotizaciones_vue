<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProveedor extends Model
{
    use HasFactory;
   
    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion');
    }
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }
}
