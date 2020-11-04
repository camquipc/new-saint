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
                            Detalle del Incidente
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <a style="font-size: 16px" class="btn-sm  pull-right "
                        href="{{url('pdf/incidente', $incidencia->id)}}" title="Imprimir Incidente">
                        <span class="fa fa-print" aria-hidden="true"></span>
                    </a>
                    @if(!Auth::user()->tipo === 2 || Auth::user()->tipo === 4)
                    <a style="font-size: 16px" href="" data-toggle="modal" data-target="#modalCreateIncidente"
                        class="btn-sm  pull-right " title="Nuevo Incidente">
                        <span class="fa fa-plus-circle" aria-hidden="true"></span>
                    </a>
                    @endif

                    @if(Auth::user()->tipo == 1)
                    @if(!$incidencia->asignada)
                    <a style="font-size: 16px" data-toggle="modal" href="" data-target="#modalAsignarTecnico"
                        class="btn-sm  pull-right " title="Asignar Técnico" data-value="{{$incidencia->id}},incidente_"
                        onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-wrench" aria-hidden="true"></span>
                    </a>
                    @endif
                    @endif

                    @if(Auth::user()->id == $incidencia->user_id_asignado &&
                    $incidencia->verificada != true)
                    <a style="font-size: 16px" data-toggle="modal" href="" data-target="#modalEstadoUpdate"
                        class="btn-sm  pull-right " title="Actualizar Estado"
                        data-value="{{$incidencia->id}},estadoUpdate_" onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-toggle-off" aria-hidden="true"></span>
                    </a>
                    @endif

                    @if(Auth::user()->tipo == 1 )
                    @if(!$incidencia->verificada)
                    <a style="font-size: 16px" href="" data-toggle="modal" data-target="#modalIncidenciaUpdate"
                        class="btn-sm  pull-right " title="Actualizar Incidencia"
                        data-value="{{$incidencia->id}},estadoUpdate_" onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>
                    @endif
                    @endif

                    @if($incidencia->estado->id == 1 || $incidencia->estado->id == 2)

                    @if(!$incidencia->verificada && Auth::user()->id == $incidencia->user->id)
                    <a style="font-size: 16px" id="btn-verificador" class="btn-sm  pull-right "
                        title="Verificar Incidencia" onclick="verificarIncidente({{$incidencia->id}})">
                        <span class="fa fa-check-square-o" aria-hidden="true"></span>
                    </a>
                    @endif
                    @endif

                    <a style="font-size: 16px;" href="{{url('/incidencias')}}" class="btn-sm btn-defaut pull-right "
                        title="Listado de Incidencias">
                        <span class="fa fa-list-ul " aria-hidden="true"></span>
                    </a>

                </div>
            </div>
            <br>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">
                        <i class="fa fa-bug" style="cursor:pointer; text-align: center;"></i>
                        Incidente </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">
                        <span class="fa fa-commenting-o" aria-hidden="true"></span>
                        Observación

                        @if($countObservacion > 0)
                        <span class="badge badge-warning">{{$countObservacion}}</span>
                        @endif
                    </a>
                </div>
            </nav>
            <!--aqui el cuerpo del body-->

            <div class="tab-content" id="nav-tabContent">

                <!--incidentes abiertos-->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <br>
                    <fieldset>
                        <legend>
                            Incidente: {{$incidencia->codigo}}
                        </legend>
                        <br>
                        <div class="card-body card-block p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="pull-left">
                                        <!--<span class="sp_titulo">Codigo Incidente: </span> {{$incidencia->codigo}} <br>-->
                                        @if ($incidencia->asignada)

                                        @if(intval($incidencia->user_asignado->id) === intval(Auth::user()->id))
                                        <span class="sp_titulo">Reportado por:</span> <span class="badge badge-success">
                                            {{ucfirst($incidencia->user->persona->p_nombre) }}
                                            {{ucfirst($incidencia->user->persona->p_apellido) }}
                                        </span><br>
                                        <span class="sp_titulo"> Departamento:</span>
                                        {{ucfirst($incidencia->user->departamento->nombre)}} <br>
                                        </span>

                                        @else
                                        <span class="sp_titulo">Asignado a:</span> <span class="badge badge-success">
                                            {{ucfirst($incidencia->user_asignado->persona->p_nombre) }}
                                            {{ucfirst($incidencia->user_asignado->persona->p_apellido )}}
                                        </span>
                                        @endif

                                        <br>
                                        @else
                                        <span class="sp_titulo">Asignado a:</span> Por asignar<br>
                                        @endif

                                        <span class="sp_titulo">Dirigido a:</span>
                                        {{$incidencia->motivo->categoria->nombre}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="pull-right">
                                        <span class="sp_titulo">Fecha: </span> {!!
                                        \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}<br>
                                        <span class="sp_titulo">Hora: </span> {!!
                                        \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}<br>
                                        <span class="sp_titulo">Condición:</span>
                                        @include('incidencia.partias.a_estado',
                                        ['estado' => $incidencia->estado->id]) <br>
                                        @if($incidencia->verificada)
                                        <span class="sp_titulo">Estado:</span> Cerrada
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <br>
                            <p>
                                <span class="sp_titulo">Motivo:</span><br>
                                {{$incidencia->motivo->nombre}}
                            </p>

                            @if(!$incidencia->detalle == '')
                            <p>
                                <span class="sp_titulo">Detalle:</span><br>
                                {{$incidencia->detalle}}
                            </p>
                            @endif

                            @if(!$incidencia->nota == '')
                            <p class="mb-0">
                                <span class="sp_titulo">Nota técnica:</span><br>
                            </p>
                            <div class="alert-info p-3 mt-1" style="color:black;">
                                {{$incidencia->nota}}
                            </div>
                            @endif
                        </div>

                    </fieldset>
                </div>

                <!--incidentes atendidos-->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!--aqui el cuerpo del body-->
                    <br>
                    <!--aqui el cuerpo del body-->
                    <fieldset>
                        <legend>
                            Observación
                        </legend>
                        <br>
                        <div class="card-body card-block p-2" style="max-height:350px; overflow-y:scroll;
                        overflow-x:hidden;">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul style="list-style: none; padding:0px;">
                                        <li class="li_tam" style="padding-top: 2px;">
                                            Listado de Comentarios
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <!--data-toggle="modal" data-target="#modalCreateObservacion"-->
                                    @if(!$incidencia->verificada && $incidencia->asignada == true)
                                    <a style="font-size: 16px; cursor:pointer;" class="btn-sm  pull-right "
                                        title="Agregar una Observación" data-toggle="modal" href=""
                                        data-target="#modalCreateObservacion"
                                        data-value="{{$incidencia->id}},observacion_"
                                        onclick="getInputValueModalIncidente(this)">
                                        <span class="fa fa-commenting-o" aria-hidden="true"></span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <ul class="list-unstyled">
                                @if(count($observaciones) > 0)
                                @if(Auth::user()->id == $incidencia->user_id_asignado)
                                @foreach ($observaciones as $observacion)

                                @if($observacion->visto)
                                <li class="media " onclick="updateObservacion({{$observacion->id}}, st = null);"
                                    title="Click para marcar como visto!" style="cursor:pointer;">
                                    @else
                                <li class="media alert-info" onclick=" updateObservacion({{$observacion->id}},
                                    st=null);" title="Click para marcar como visto!" style="cursor:pointer;">
                                    @endif

                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">
                                            {{ucfirst($observacion->user->persona->p_nombre)}}
                                            {{ucfirst($observacion->user->persona->p_apellido)}}
                                            (@include('usuario.assets.usuarios_tipo', ['usuario' =>
                                            Auth::user()->tipo]))
                                            <span class="pull-right">

                                                {!!\Carbon\Carbon::parse($observacion->created_at)->diffForHumans()
                                                !!}
                                            </span>
                                        </h6>
                                        {{$observacion->observacion}}

                                    </div>
                                </li>
                                @endforeach
                                @else
                                @foreach ($observaciones as $observacion)
                                @if($observacion->user->tipo != '1')
                                <li class="media ">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">
                                            {{ucfirst($observacion->user->persona->p_nombre)}}
                                            {{ucfirst($observacion->user->persona->p_apellido)}}
                                            (@include('usuario.assets.usuarios_tipo', ['usuario' =>
                                            Auth::user()->tipo]))
                                            <span class="pull-right">
                                                {!!\Carbon\Carbon::parse($observacion->created_at)->diffForHumans()
                                                !!}
                                            </span>
                                        </h6>
                                        {{$observacion->observacion}}

                                    </div>
                                </li>
                                @endif
                                @endforeach

                                @endif
                                @else
                                <li class="media ">
                                    <div class="media-body">
                                        Sin comentarios!...
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </fieldset>
                    <!--aqui el cuerpo del body-->
                </div>
            </div>

        </div>
    </div>
</div>



@include('incidencia.partias.asignar')
@include('incidencia.partias.observacion')
@include('incidencia.partias.estado')


@endsection