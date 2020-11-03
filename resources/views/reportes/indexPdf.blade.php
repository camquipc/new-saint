@extends('layouts.app')

@section('content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Módulo Reportes</strong>
    </div>
    <div class="card-body card-block">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

          <a class="nav-item nav-link active" href="#nav-incidente" data-toggle="tab" role="tab"
            aria-controls="nav-home" aria-selected="true">

            <i class="fa fa-bug"></i> Incidentes</a>

          <a class="nav-item nav-link " href="#nav-informe-tecnico" data-toggle="tab" role="tab" aria-selected="false">

            <i class="fa fa-file-text-o"></i> Informe Técnico</a>

          <a class="nav-item nav-link" href="#nav-departamento" data-toggle="tab" role="tab" aria-selected="false">
            <i class="fa fa-bank"></i> Departamentos</a>

          <a class="nav-item nav-link " href="#nav-division-otic" data-toggle="tab" role="tab" aria-selected="false">

            <i class="fa fa-sitemap "></i> División OTIC</a>

          <a class="nav-item nav-link" data-toggle="tab" href="#nav-grafico" role="tab" aria-selected="false">
            <i class="fa fa-pie-chart"></i> Graficos</a>
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-incidente" role="tabpanel">
          <br>
          <form class="form-inline pull-right">
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <label for="desde" class="mr-1">Desde</label>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde">
            <label for="hasta" class="mr-1">Hasta</label>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta">
            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
              <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
            </button>
          </form>
          <!--<input type="text" class="form-control form-control-sm mr-2 " style="width:70px;" placeholder="Codigo">-->

          <!--<select class="form-control form-control-sm mr-2">
              <option value="">Usuario</option>
            </select>

            <select class="form-control form-control-sm mr-2">
              <option value="">Departamento</option>
            </select>-->
          <!--<select class="form-control form-control-sm mr-2" style="width:85px;">
              <option value="">Estado</option>
            </select>-->


        </div>

        <!--informe tecnico-->
        <div class="tab-pane fade" id="nav-informe-tecnico" role="tabpanel">
          <br>
          <form class="form-inline pull-right">
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde">
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta">
            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
              <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
            </button>
          </form>

        </div>

        <!--departamento-->
        <div class="tab-pane fade" id="nav-departamento" role="tabpanel">
          <br>
          <form class="form-inline pull-right">
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde">
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta">
            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
              <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
            </button>
          </form>
        </div>

        <!--division otic-->
        <div class="tab-pane fade" id="nav-division-otic" role="tabpanel">
          <br>
          <form class="form-inline pull-right">
            <p class="mt-3 mr-3"> Filtro de busqueda </p>
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Desde">
            <input type="date" class="form-control form-control-sm mr-2" style="width:170px;" placeholder="Hasta">
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
          <div class="row">
            <div class="col-md-6">
              <div class="card ">
                <div class="header">
                  <h4 class="title">Graficos</h4>
                  <p class="category"></p>
                </div>
                <div class="content">
                  Graficos
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card ">
                <div class="header">
                  <h4 class="title">Graficos</h4>
                  <p class="category"></p>
                </div>
                <div class="content">
                  Graficos
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection