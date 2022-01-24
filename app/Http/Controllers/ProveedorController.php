<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;

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

    public function store( $request)
    {
        //
    }

   
    public function show(Proveedor $proveedor)
    {
        //
    }

   
    public function edit(Proveedor $proveedor)
    {
        //
    }

   
    public function update( $request, Proveedor $proveedor)
    {
        //
    }

    public function destroy($id)
    {
        Proveedor::findOrFail($id)->delete();
        return response(true);
    }
}
