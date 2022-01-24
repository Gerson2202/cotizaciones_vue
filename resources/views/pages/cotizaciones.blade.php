@extends('layouts.app', ['activePage' => 'cotizaciones', 'titlePage' => __('Table Cotizaciones')])

@section('content')
<div class="content ">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" >
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Cotizaciones</h4>
                    <p class="card-category"> Aca tendras el listado de las cotizaciones emitidas</p>
                  </div>
                  <div class="card-body">
                    
                     <cotizaciones /> 
                  </div>
                </div>
              </div>
              
            </div>
          </div>
    </div>

</div>
@endsection