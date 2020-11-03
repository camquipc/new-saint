<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home" aria-selected="true">
            <i class="fa fa-clock-o" style="color: #ffbc34; cursor:pointer; text-align: center;"
                title="En espera..."></i>
            Pendientes </a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">
            <span class="fa fa-wrench" aria-hidden="true"></span>
            Asignados</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            <i class="fa fa-check-circle" style="color: #55ce63; cursor:pointer; text-align: center;"
                title="Solucionado"></i>
            Solucionados</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact2" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            <i class="fa fa-circle" style="color: #55ce63; cursor:pointer; text-align: center;"
                title="Incidente abierto"></i>
            Abiertos</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact3" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            <i class="fa fa-check-circle" style="color:red; cursor:pointer; text-align: center;"
                title="Atendida (Sin solución)"></i>
            Sin Solución</a>
    </div>
</nav>
<br>
<div class="tab-content" id="nav-tabContent">

    <!--pendientes por asignar-->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <br>
        <table class="table table-striped  bootstrap-data-table">

            <thead>
                <tr>
                    <th style="text-align: left; padding-left: 2px;">Incidente</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Departamento</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>

                    <!-- <th style="text-align: left; padding-left: 0px;" class="uppercase">Asignado</th>-->
                    <th width="20"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($incidencias as $incidencia)
                @if(!$incidencia->asignada)

                <tr title="Por asignar " style="cursor:pointer;">

                    <td class="uppercase">{{$incidencia->codigo}}</td>
                    <td class="uppercase">
                        {{ucfirst($incidencia->user->departamento->nombre)}}
                    </td>
                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
                    <td class="uppercase">
                        {{$incidencia->motivo->categoria->nombre}}
                    </td>

                    <td class="uppercase">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </td>
                    <!-- <td class="uppercase">
                            {!! \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}
                        </td>-->

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}"
                                title="Ver detalles" style="color:black;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>

                            @if (!$incidencia->asignada)
                            <a class="btn  btn-sm" data-toggle="modal" data-target="#modalAsignarTecnico"
                                title="Asignar Técnico" data-value="{{$incidencia->id}},incidente_"
                                onclick="getInputValueModalIncidente(this)">
                                <span class="fa fa-wrench" aria-hidden="true"></span>
                            </a>
                            @else
                            <a class="btn-sm  pull-right " title="Imprimir Incidente">
                                <span class="fa fa-print" aria-hidden="true"></span>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!--asignados-->
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <br>
        <table class="table table-striped  bootstrap-data-table" id="">
            <thead>
                <tr>
                    <th style="text-align: left; padding-left: 2px;">Incidente</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Departamento
                    </th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                @if($incidencia->asignada)
                <tr title="Por asignar " style="cursor:pointer;">
                    <td class="uppercase">{{$incidencia->codigo}}</td>
                    <td class="uppercase">
                        {{ucfirst($incidencia->user->departamento->nombre)}}
                    </td>

                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>

                    <td class="uppercase">{{$incidencia->motivo->categoria->nombre}}</td>

                    <td class="uppercase">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}"
                                title="Ver detalles" style="color:black;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a class="btn-sm  pull-right " title="Imprimir Incidente">
                                <span class="fa fa-print" aria-hidden="true"></span>
                            </a>
                            <img class="btn  btn-sm" src="{{asset('img/tecnico.png')}}"
                                style="width:15px; cursor:pointer; height: 15px;"
                                title="Asignado a {{$incidencia->user_asignado->persona->p_nombre }} {{$incidencia->user_asignado->persona->p_apellido }}">

                            <a style="cursor:pointer;" class="btn-sm  pull-right " title="Agregar una Observación"
                                data-toggle="modal" href="" data-target="#modalCreateObservacion"
                                data-value="{{$incidencia->id}},observacion_"
                                onclick="getInputValueModalIncidente(this)">
                                <span class="fa fa-commenting-o" aria-hidden="true"></span>
                            </a>
                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!--solucionados-->
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
        <table class="table table-striped  bootstrap-data-table" id="">

            <thead>
                <tr>
                    <th style="text-align: left; padding-left: 2px;">Incidente</th>
                    <th style=" padding-left: 2pxpx;" class="uppercase">Departamento</th>
                    <th></th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>
                    <th></th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>

                    <!-- <th style="text-align: left; padding-left: 0px;" class="uppercase">Asignado</th>-->
                    <th class="text-rigth"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($incidencias as $incidencia)
                @if($incidencia->estado->id == 2 && $incidencia->verificada == true)

                <tr>
                    <td class="uppercase">{{$incidencia->codigo}}</td>
                    <td class="uppercase">
                        {{ucfirst($incidencia->user->departamento->nombre)}}
                    </td>
                    <td></td>
                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
                    <td></td>
                    <td class="uppercase">{{$incidencia->motivo->categoria->nombre}}</td>

                    <td class="uppercase">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </td>
                    <!-- <td class="uppercase">
                            {!! \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}
                        </td>-->

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}"
                                title="Ver detalles" style="color:black;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a class="btn-sm  " title="Imprimir Incidente">
                                <span class="fa fa-print" aria-hidden="true"></span>
                            </a>

                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!--incidentes abiertos-->
    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
        <table class="table table-striped  bootstrap-data-table" id="">

            <thead>
                <tr>
                    <th style="text-align: left; padding-left: 2px;">Incidente</th>
                    <th style=" padding-left: 2pxpx;" class="uppercase">Departamento</th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>

                    <!-- <th style="text-align: left; padding-left: 0px;" class="uppercase">Asignado</th>-->
                    <th class="text-rigth">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($incidencias as $incidencia)
                @if($incidencia->estado->id == 2 && $incidencia->verificada == true)

                <tr>
                    <td class="uppercase">{{$incidencia->codigo}}</td>
                    <td class="uppercase">
                        {{ucfirst($incidencia->user->departamento->nombre)}}
                    </td>

                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>

                    <td class="uppercase">{{$incidencia->motivo->categoria->nombre}}</td>

                    <td class="uppercase">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </td>
                    <!-- <td class="uppercase">
                            {!! \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}
                        </td>-->

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}"
                                title="Ver detalles" style="color:black;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a style="cursor:pointer;" class="btn-sm  pull-right " title="Agregar una Observación"
                                data-toggle="modal" href="" data-target="#modalCreateObservacion"
                                data-value="{{$incidencia->id}},observacion_"
                                onclick="getInputValueModalIncidente(this)">
                                <span class="fa fa-commenting-o" aria-hidden="true"></span>
                            </a>
                            <a class="btn-sm  " title="Imprimir Incidente">
                                <span class="fa fa-print" aria-hidden="true"></span>
                            </a>

                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!--incidentes atendidos-->
    <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
        <table class="table table-striped bootstrap-data-table" id="">

            <thead>
                <tr>
                    <th style="text-align: left; padding-left: 2px;">Incidente</th>
                    <th style=" padding-left: 2pxpx;" class="uppercase">Departamento</th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>

                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido</th>
                    <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>

                    <!-- <th style="text-align: left; padding-left: 0px;" class="uppercase">Asignado</th>-->
                    <th class="text-rigth">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($incidencias as $incidencia)
                @if($incidencia->estado->id == 3 && $incidencia->verificada == true)

                <tr>
                    <td class="uppercase">{{$incidencia->codigo}}</td>
                    <td class="uppercase">
                        {{ucfirst($incidencia->user->departamento->nombre)}}
                        <!--{{ucfirst($incidencia->user->persona->p_apellido)}}-->
                    </td>
                    <td></td>
                    <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
                    <td></td>
                    <td class="uppercase">{{$incidencia->motivo->categoria->nombre}}</td>

                    <td class="uppercase">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </td>
                    <!-- <td class="uppercase">
                            {!! \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}
                        </td>-->

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}"
                                title="Ver detalles" style="color:black;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a class="btn-sm  " title="Imprimir Incidente">
                                <span class="fa fa-print" aria-hidden="true"></span>
                            </a>

                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>