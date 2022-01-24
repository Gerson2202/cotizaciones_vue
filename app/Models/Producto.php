<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

     // relations uno a muchos  con categoria
     public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
