<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ProductoProveedor;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::all();

    }
    
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
       $Cotizacion=new Producto();
        $Cotizacion->nombre=$request->nombre;
        $Cotizacion->descripcion=$request->descripcion;
        $Cotizacion->categoria_id=$request->categoria_id;
        $Cotizacion->save();
       
        return response(true);
    }

    
    public function show($id)
    {
        $infoProducto=Producto::findOrFail($id);
        $proveedores=Proveedor::all();
        $preciosProveedores=ProductoProveedor::where('producto_id',$id)->get()->load('proveedor');
        // ENVIANDO DATOS DE LA REALCION 
        $categoriaProducto=$infoProducto->categoria;
        return view('pages.productoShow',compact('infoProducto','proveedores','categoriaProducto','preciosProveedores'));
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $Cotizacion=Producto::findOrFail($id);
        $Cotizacion->nombre=$request->nombre;
        $Cotizacion->descripcion=$request->descripcion;
        $Cotizacion->categoria_id=$request->categoria_id;
        $Cotizacion->save();
       
        return response(true);
    }

    
    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return response(true);
    }
}
