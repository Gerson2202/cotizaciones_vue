<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoPrecioController extends Controller
{
   
    public function index($id)
    {
        $preciosProveedores=ProductoProveedor::where('producto_id',$id)->get()->load('proveedor');
        return $preciosProveedores;
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
         $aggPrecio=new ProductoProveedor();
         $aggPrecio->producto_id=$request->producto_id;
         $aggPrecio->proveedor_id=$request->proveedor_id;
         $aggPrecio->precio=$request->precio;
         $aggPrecio->save();
         return response(true);
        // return $request;
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        ProductoProveedor::findOrfail($id)->delete();
        return response(true);
    }

    public function imgStore(Request $request,$id)
    {
           $imagenes=$request->img->store('public/imagenes/productos');
           $url=Storage::url($imagenes);
        //   $producto=Producto::findOrFail($id);
        //   $producto->img=$url;
        //   $producto->save();
          return $url;
    }
}
