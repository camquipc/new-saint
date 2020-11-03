@extends('layouts.app')

@section('content')

<div class="col-lg-12">

    <div class="row">
        <div class="col-sm-3">
            <div class="card" style=" border-left: 4px solid #55ce63;">
                <div class="card-block p-0">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="font-weight-bold text-center mb-0 mt-1">Incidentes Abiertos</p>
                        </div>
                        <div class="col-md-12 p-0">
                            <h1 class="text-center"><i class="fa fa-bug" aria-hidden="true"></i>
                                {{ $incidenteAb}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style=" border-left: 4px solid red;">
                <div class="card-block p-0">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="font-weight-bold text-center mb-0 mt-1">Sin solución </p>
                        </div>
                        <div class="col-md-12 p-0">
                            <h1 class="text-center"><i class="fa fa-check-circle" title="Atendida (Sin solución)"></i>
                                {{ $incidenteSin}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style=" border-left: 4px solid #ffbc34;">
                <div class="card-block p-0">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="font-weight-bold text-center mb-0 mt-1">En espera </p>
                        </div>
                        <div class="col-md-12 p-0">
                            <h1 class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ $incidenteEs}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style=" border-left: 4px solid blue;">
                <div class="card-block p-0">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="font-weight-bold text-center mb-0 mt-1">Asignados </p>
                        </div>
                        <div class="col-md-12 p-0">
                            <h1 class="text-center"><i class="fa fa-wrench" aria-hidden="true"></i>

                                {{ $incidenteAsin}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <!--<div class="col-sm-12">-->
                    <div class="card ">
                        <div class="card-block pt-1 pb-1">
                            <h4 class="card-title">Incidentes Reportados</h4>
                            <div class="table-responsive ">
                                <table class="table stylish-table">
                                    <thead>
                                        <tr>
                                            <th colspan="1">Dirigido a</th>
                                            <th colspan="2">Motivo</th>

                                            <th colspan="1" class="text-center"><i class="fa fa-ellipsis-h"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-table"></tbody>
                                </table>
                            </div>
                            <!--esta es el formulario para asignar técnico a la incidencia-->
                            @include('incidencia.partias.asignar')
                        </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>

         <div class="col-md-6">
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
        <div class="col-md-6">
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

</div>
{!! Charts::scripts() !!}

{!! $chart2->script() !!}
{!! $chart3->script() !!}
@endsection