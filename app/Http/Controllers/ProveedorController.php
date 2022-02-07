<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
   
    public function index()
    {
        return Proveedor::all();

    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $proveedor= new Proveedor;
        $proveedor->nombre=$request->nombre;
        $proveedor->descripcion=$request->descripcion;
        $proveedor->direccion=$request->direccion;
        $proveedor->tiempo_envio=$request->tiempo_envio;
        $proveedor->save();
        return response(true);
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
        $proveedor= Proveedor::findOrFail($id);
        $proveedor->nombre=$request->nombre;
        $proveedor->descripcion=$request->descripcion;
        $proveedor->direccion=$request->direccion;
        $proveedor->tiempo_envio=$request->tiempo_envio;
        $proveedor->save();
        return response(true);
    }

    
    public function destroy($id)
    {
        Proveedor::findOrFail($id)->delete();
        return response(true);
    }
}
