@extends('layouts.app')

@section('content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Módulo Reportes</strong>
    </div>

    <div class="card-body card-block">
    @include('flash::message')
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

          <a class="nav-item nav-link active" href="#nav-incidente" data-toggle="tab" role="tab"
            aria-controls="nav-home" aria-selected="true">

            <i class="fa fa-bug"></i> Incidentes</a>

          <a class="nav-item nav-link " href="#nav-informe-tecnico" data-toggle="tab" role="tab" aria-selected="false">

            <i class="fa fa-file-text-o"></i> Informe Técnico</a>
          <a class="nav-item nav-link" data-toggle="tab" href="#nav-grafico" role="tab" aria-selected="false">
            <i class="fa fa-pie-chart"></i> Graficos</a>
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-incidente" role="tabpanel">
          <br>
          <form class="form-inline pull-right" action="/pdf/incidencias" method="POST">
            {{ csrf_field() }}
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <label for="desde" class="mr-1">Desde</label>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde" name="desde">
            <label for="hasta" class="mr-1">Hasta</label>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta" name="hasta">
            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
              <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
            </button>
          </form>

        </div>

        <!--informe tecnico-->
        <div class="tab-pane fade" id="nav-informe-tecnico" role="tabpanel">
          <br>
          <form class="form-inline pull-right" action="pdf/informe_tecnico" method="POST">
          {{ csrf_field() }}
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <input type="test" name="codigo_" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Codigo incidente">
            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
              <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
            </button>
          </form>

        </div>

        <!--grafico-->
        <div class="tab-pane fade" id="nav-grafico" role="tabpanel">
            <br>
            <form class="form-inline pull-right">
              <p class="mt-3 mr-3"> Filtro de busqueda </p>
              <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde">
              <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta">
              <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
                <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
              </button>
            </form>

              <br><br>
           
              <div class="col-lg-12">
              @if(isset($chart2) && isset($chart3))
                <div class="row">
                    <div class="col-md-8">
                      <div class="card ">
                          <div class="header">
                              <h4 class="title"></h4>
                              <p class="category"></p>
                          </div>
                          <div class="content">
                              {!! $chart2->html() !!}
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card ">
                          <div class="header">
                              <h4 class="title"></h4>
                              <p class="category"></p>
                          </div>
                          <div class="content">
                              {!! $chart3->html() !!}
                          </div>
                      </div>
                  </div>
                </div>
              @endif
             </div>
        </div>

      </div>
    </div>
  </div>
</div>


{!! Charts::scripts() !!}
@if(isset($chart2) && isset($chart3))
{!! $chart2->script() !!}
{!! $chart3->script() !!}
@endif
@endsection