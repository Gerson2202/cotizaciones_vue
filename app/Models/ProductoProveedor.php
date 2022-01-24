<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoProveedor extends Model
{
    use HasFactory;
   
    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }
}
