<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

     // relations uno a muchos  conj clientes
     public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
}
