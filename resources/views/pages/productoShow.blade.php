@extends('layouts.app', ['activePage' => 'clientes', 'titlePage' => __('Informacion de producto')])


@section('content')
  <div class="content ">
      <div id="app">
        
          <div class="container-fluid">
            <producto_precios :proveedores="{{$proveedores}}" :producto="{{$infoProducto}}" :productocat="{{$categoriaProducto}}" :precios="{{$preciosProveedores}}" />
          </div>
      </div>

  </div>
@endsection