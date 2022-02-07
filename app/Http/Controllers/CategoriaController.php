<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function index()
    {
        return Categoria::all();
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $categoria=new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();
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
       $categoria=Categoria::findOrFail($id);
       $categoria->nombre=$request->nombre;
       $categoria->save();
       return response (true);
    }

   
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return response(true);
    }
}
