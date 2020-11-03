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
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">
                        <i class="fa fa-file-text-o"></i> Informe Técnico</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <br>
                <!--informes tecnico de los incidentes-->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="row mt-2 mb-2">

                        <div class="col-md-2">
                            <ul style="list-style: none; padding:0px;">
                                <li class="li_tam" style="padding-top: 2px;">
                                    Filtro de busqueda
                                </li>
                            </ul>
                        </div>
                        <!--<p class="mt-3 mr-3"></p>-->
                        <div class="col-md-10">

                            {!! Form::open(['url' => 'reportes', 'autocomplete'=>'off' , 'class' => 'form-inline
                            pull-right' , 'method' => 'POST'] ) !!}


                            <label for="desde" class="mr-1">Desde</label>
                            <input type="date" id="desde" class="form-control form-control-sm mr-2" style="width:170px;"
                                placeholder="Desde" name="desde">

                            <label for="hasta" class="mr-1">Hasta</label>
                            <input type="date" id="hasta" class="form-control form-control-sm mr-2" style="width:170px;"
                                placeholder="Hasta" name="hasta">

                            <label for="hasta" class="mr-1">Estado</label>
                            <select class="form-control form-control-sm mr-2" style="width:85px;" name="estado">
                                <option value="">Estado</option>
                                <option value="true">Abierto</option>
                                <option value="false">Cerrado</option>
                            </select>
                            <button type="reset" class="mr-2">
                                <i class="fa fa-trash" aria-hidden="true" style="font-size:16px;"></i>
                            </button>

                            <button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
                                <i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            @if($incidencias)
            <div class="row mt-4">
                <div class="col">
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <th style="text-align: left; padding-left: 2px;">Incidente</th>
                                <th style="text-align: left; padding-left: 0px;" class="uppercase">Departamento
                                </th>
                                <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>
                                <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>
                                <th style="text-align: center; padding-left: 0px;">
                                    {!! Form::open(['url' => 'pdf/info_tec_list', 'method' => 'POST'] ) !!}
                                    <input type="hidden" name="desde" value="{{$desde}}">
                                    <input type="hidden" name="hasta" value="{{$hasta}}">
                                    <input type="hidden" name="estado" value="{{$estado}}">
                                    <button type="submit" title="Imprimir listado">
                                        <span class="fa fa-print" aria-hidden="true"></span>
                                    </button>
                                    {!! Form::close() !!}
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidencias as $incidencia)
                                <tr>
                                    <td class="uppercase">
                                        {{$incidencia->codigo}}
                                    </td>
                                    <td class="uppercase">
                                        {{ucfirst($incidencia->user->departamento->nombre)}}
                                    </td>
                                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
                                    <td class="uppercase">
                                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                                    </td>
                                    <td style="text-align: center; padding-left: 0px;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn-sm  pull-right " title="Imprimir Incidente"
                                                href="{{url('/pdf/informetecnico', $incidencia->id)}}"
                                                style="color:black;">
                                                <span class="fa fa-print" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $incidencias->render() !!}

                </div>

            </div>

            @else
            <div class="row mt-4">
                <div class="col">
                    <p class="text-center">Debe selecionar un criterio de busqueda!</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>



@endsection