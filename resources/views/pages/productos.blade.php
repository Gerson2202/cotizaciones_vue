@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => __('Table productos')])

@section('content')
<div class="content ">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-6" >
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Productos</h4>
                    <p class="card-category"> Aca tendras el listado de las Productos emitidas</p>
                  </div>
                  <div class="card-body">
                     <productos /> 
                  </div>
                </div>
              </div>

              <div class="col-md-6" >
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Categorias</h4>
                    <p class="card-category"> Aca tendras el listado de las Categorias emitidas</p>
                  </div>
                  <div class="card-body">
                     <categorias /> 
                  </div>
                </div>
              </div>
              
            </div>
          </div>
    </div>

</div>
@endsection