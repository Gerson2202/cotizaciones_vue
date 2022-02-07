<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
   
    public function index()
    {
        return Cliente::all();

    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $cliente= new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->descripcion=$request->descripcion;
        $cliente->tiempo_camioneta=$request->tiempo_camioneta;
        $cliente->save();
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
        $cliente= Cliente::findOrFail($id);
        $cliente->nombre=$request->nombre;
        $cliente->descripcion=$request->descripcion;
        $cliente->tiempo_camioneta=$request->tiempo_camioneta;
        $cliente->save();
        return response(true);
    }

    
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return response(true);
    }
}
