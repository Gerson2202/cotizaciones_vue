@extends('layouts.app', ['activePage' => 'proveedores', 'titlePage' => __('Table Proveedores')])

@section('content')
<div class="content ">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" >
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Proveedores</h4>
                    <p class="card-category"> Aca tendras el listado de los Proveedores emitidas</p>
                  </div>
                  <div class="card-body">
                     <proveedores /> 
                  </div>
                </div>
              </div>
              
            </div>
          </div>
    </div>

</div>
@endsection