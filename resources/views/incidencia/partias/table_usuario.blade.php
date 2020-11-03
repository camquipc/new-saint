<table class="table table-striped  bootstrap-data-table mt-3">
    <thead>
        <tr>
            <!--<th style="text-align: left;"></th>-->
            <th style="text-align: left; padding-left: 2px;">Incidente</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Dirigido a</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Motivo</th>
            <th style="text-align: left; padding-left: 0px;" class="uppercase">Fecha </th>
            <th style="text-align: center; padding-left: 0px;" class="uppercase">Estado</th>
            <th style="text-align: center; padding-left: 0px;" class="uppercase">Condición</th>
            <th width="20" style="text-align: center; padding-left: 0px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php $contador = 1; ?>
        @foreach ($incidencias as $incidencia)

        @if($incidencia->user_id == Auth::user()->id )
        <tr>
            <td class="uppercase"
                style="{{ ($incidencia->verificada == false && $incidencia->estado->id == 2 ) ? 'border-left:3px solid red;': ''}}">
                {{$incidencia->codigo}}
            </td>

            <td class="uppercase">
                {{$incidencia->motivo->categoria->nombre}}
            </td>

            <td class="uppercase">
                {{$incidencia->motivo->nombre}}
            </td>

            <td class="uppercase">
                {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
            </td>

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
            <td style=" text-align: right;">
                <div class="btn-group" role="group" aria-label="Basic example">

                    @if($incidencia->asignada && $incidencia->estado->id != 2)
                    <img class="btn  btn-sm" src="{{asset('img/tecnico.png')}}"
                        style="width:15px; cursor:pointer; height: 15px;"
                        title="Asignado a {{$incidencia->user_asignado->persona->p_nombre }} {{$incidencia->user_asignado->persona->p_apellido }}">
                    @else

                    @endif

                    @if(!$incidencia->verificada && $incidencia->estado->id == 2)
                    <a id="btn-verificador" class="btn-sm  pull-right " title="Verificar Incidencia"
                        onclick="verificarIncidente({{$incidencia->id}})" style="cursor:pointer;">
                        <span class="fa fa-check-square-o" aria-hidden="true"></span>
                    </a>
                    @endif
                    <a class="btn  btn-sm" href="{{url('incidencia/show', $incidencia->id)}}" title="Ver detalles"
                        style="color:black;">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a class="btn-sm  pull-right " href="{{url('pdf/incidente', $incidencia->id)}}"
                        title="Imprimir Incidente" style="color:black;">
                        <span class="fa fa-print" aria-hidden="true"></span>
                    </a>
                </div>
            </td>
        </tr>

        @endif

        <?php $contador++;?>
        @endforeach
    </tbody>
</table>