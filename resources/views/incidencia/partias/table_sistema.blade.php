<table id="bootstrap-data-table-export " class="table table-striped  bootstrap-data-table">
    <thead>
        <tr>
            <th style="text-align: left; padding-left: 2px;">Incidente</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Nombre y Apellido</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha</th>
            <th style="text-align: center; padding-left: 0px;" class="uppercase">Estado</th>
            <th style="text-align: center; padding-left: 0px;" class="uppercase">Condición</th>
            <th width="20"></th>
        </tr>
    </thead>
    <tbody>
        <?php $contador = 1; ?>
        @foreach ($incidencias as $incidencia)


        @if($incidencia->user_id_asignado == Auth::user()->id)

        <tr>
            @if($incidencia->verificada == false && $incidencia->estado->id == 2)
            <td class="uppercase" style="border-left:3px solid red;">
                {{$incidencia->codigo}}
            </td>
            @else
            <td class="uppercase">
                {{$incidencia->codigo}}
            </td>
            @endif

            <td class="uppercase">
                {{ucfirst($incidencia->user->persona->p_nombre)}}
                {{ucfirst($incidencia->user->persona->p_apellido)}}
            </td>
            <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
            <td class="uppercase">

                {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
            </td>
            <!--<td>
                {!! \Carbon\Carbon::parse($incidencia->hora)->format("h:i:s a") !!}

            </td>-->

            <td class="uppercase" style="text-align: center; padding-left: 0px;">
                @if($incidencia->verificada)
                <i class="fa fa-circle" style="color:red;cursor:pointer; text-align: center;"
                    title="Incidente cerrado"></i>

                @else
                <i class="fa fa-circle" style="color: #55ce63; cursor:pointer; text-align: center;"
                    title="Incidente abierto"></i>
                @endif
            </td>

            <td class="uppercase" style="text-align: center; padding-left: 0px;">
                @include('incidencia.partias.a_estado', ['estado' => $incidencia->estado->id])
            </td>
            <td>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}" title="Ver detalles"
                        style="color:black;">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    @if(Auth::user()->tipo == 'admin')
                    @if (!$incidencia->asignada)
                    <a class="btn  btn-sm" data-toggle="modal" data-target="#modalAsignarTecnico"
                        title="Asignar Técnico" data-value="{{$incidencia->id}},incidente_"
                        onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-wrench" aria-hidden="true"></span>
                    </a>
                    @endif
                    @else
                    <a class="btn-sm  pull-right " title="Imprimir Incidente"
                        href="{{url('/pdf/informetecnico', $incidencia->id)}}" style="color:black;">
                        <span class="fa fa-print" aria-hidden="true"></span>
                    </a>
                    @endif
                </div>
            </td>
        </tr>

        @endif
        <?php $contador++;?>
        @endforeach
    </tbody>
</table>