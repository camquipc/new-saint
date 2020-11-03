@extends('layouts.app')

@section('content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Configuración Generales</strong>
    </div>
    <div class="card-body card-block">
      @include('flash::message')
      @include('errors.erros')
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home5" aria-selected="false">
            <i class="fa fa-institution"></i> Unidad Administrativa</a>

          <a class="nav-item nav-link " id="nav-otic-tab" data-toggle="tab" href="#nav-otic" role="tab"
            aria-controls="nav-home1" aria-selected="false">
            <i class="fa fa-sitemap"></i> Divisiones</a>

          <a class="nav-item nav-link " id="nav-otic-tab1" data-toggle="tab" href="#nav-motivos" role="tab"
            aria-controls="nav-home2" aria-selected="false">
            <i class="fa fa-folder-o"></i> Motivos</a>

          <a class="nav-item nav-link " id="nav-otic-tab2" data-toggle="tab" role="tab" aria-controls="nav-home"
            aria-selected="false" href="#nav-estados">
            <i class="fa fa-toggle-on"></i> Condición Incidente</a>

          <a class="nav-item nav-link" id="nav-contact-tab3" data-toggle="tab" href="#nav-sistema" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            <i class="fa fa-laptop"></i> Sistema</a>

          <a class="nav-item nav-link " id="nav-otic-tab3" data-toggle="tab" role="tab" aria-controls="nav-home"
            aria-selected="false" href="#nav-generales">
            <i class="fa fa-toggle-on"></i> Generales</a>

        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <br>
          @include('configuracion.departamento.index')
        </div>

        <div class="tab-pane fade " id="nav-otic" role="tabpanel" aria-labelledby="nav-otic-tab">
          <br>
          @include('configuracion.divisiones.index')
        </div>

        <div class="tab-pane fade " id="nav-motivos" role="tabpanel" aria-labelledby="nav-otic-tab">
          <br>
          @include('configuracion.motivos.index')
        </div>

        <div class="tab-pane fade " id="nav-estados" role="tabpanel" aria-labelledby="nav-otic-tab">
          <br>
          @include('configuracion.estados.index')
        </div>

        <div class="tab-pane fade " id="nav-sistema" role="tabpanel" aria-labelledby="nav-otic-tab">
          <br>
          @include('configuracion.sistema.form_sistema')
        </div>


        <div class="tab-pane fade" id="nav-generales" role="tabpanel" aria-labelledby="nav-contact-tab">
          <br>
          @include('configuracion.generales.index_generales')
        </div>

      </div>
    </div>
  </div>
</div>
</div>

@endsection