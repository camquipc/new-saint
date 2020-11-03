@extends('layouts.app')

@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Módulo Incidentes</strong>
        </div>

        <div class="card-body card-block">

            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>


                <div class="col-md-6">
                    <ul style="list-style: none; padding:0px;">
                        <li class="li_tam" style="padding-top: 2px;">
                            Listado de Incidentes
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <a style="font-size: 18px; cursor:pointer; color:#ffbc34;" href="" data-toggle="modal"
                        data-target="#modalAyudaInmediata" class="btn-sm  pull-right " title="Ver Ayuda!">
                        <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                    </a>

                    @if(Auth::user()->tipo != 2)
                    <a style="font-size: 18px" href="#" data-toggle="modal" data-target="#modalCreateIncidente"
                        class="btn-sm  pull-right " title="Nuevo Incidente">
                        <span class="fa fa-plus-circle" aria-hidden="true"></span>
                    </a>
                    @endif

                </div>
            </div>
            <div class="realtime">


                @if(Auth::user()->tipo == 1)

                @include('incidencia.partias.table_admin', ['incidencias' => $incidencias])
                @include('incidencia.partias.asignar')
                @include('incidencia.partias.observacion')
                @endif

                @if(Auth::user()->tipo == 2)

                @include('incidencia.partias.table_sistema', ['incidencias' => $incidencias])

                @endif

                @if(Auth::user()->tipo == 3)

                @include('incidencia.partias.table_usuario', ['incidencias' => $incidencias])

                @endif

                @if(Auth::user()->tipo == 4)

                @include('incidencia.partias.table_basico', ['incidencias' => $incidencias])

                @endif
            </div>
        </div>
    </div>
</div>


@include('incidencia.partias.create')
@if(count($incidencias) < 0) @include('incidencia.partias.asignar') @endif @endsection