<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacioneController extends Controller
{
   
    public function index()
    {
        return Cotizacion::all();
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
         $Cotizacion=new Cotizacion();
         $Cotizacion->nombre=$request->nombre;
         $Cotizacion->descripcion=$request->descripcion;
         $Cotizacion->codigo=$request->codigo;
         $Cotizacion->estado=$request->estado;
         $Cotizacion->cliente_id=$request->cliente_id;
        $Cotizacion->save();

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
        $cotizacion=Cotizacion::findOrFail($id);
        $cotizacion->nombre=$request->nombre;
        $cotizacion->descripcion=$request->descripcion;
        $cotizacion->codigo=$request->codigo;
        $cotizacion->estado=$request->estado;
        $cotizacion->cliente_id=$request->cliente_id;
        $cotizacion->save();
        return response (true);
    }

   
    public function destroy($id)
    {
       Cotizacion::findOrFail($id)->delete();
       return response(true);
    }
}
