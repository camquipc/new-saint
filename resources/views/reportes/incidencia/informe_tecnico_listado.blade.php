@extends('reportes.plantilla')

@section('content')


<h4>LISTADO DE INFORMES TÉCNICO</h4>

<!-- text-transform: uppercase;-->
<br>

<table style="text-align: right; ">
    <tr colspan="6">
        <td style="text-align: center;">
            INCIDENTES DESDE {!! \Carbon\Carbon::parse($desde)->format("d-m-Y") !!} HASTA {!!
            \Carbon\Carbon::parse($hasta)->format("d-m-Y") !!}
        </td>
    </tr>
</table>
<table>
    <thead>
        <tr>
            <th>Incidente</th>
            <th>Departamento</th>
            <th>Motivo</th>
            <th>Fecha</th>
            <th>Condición</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incidencias as $incidencia)
        <tr>
            <td style=" text-align:center;">
                {{$incidencia->codigo}}
            </td>
            <td>
                {{ucfirst($incidencia->user->departamento->nombre)}}
            </td>
            <td>{{$incidencia->motivo->nombre}}</td>
            <td>
                {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
            </td>
            <td>
                @if(!$incidencia->verificada)
                <span>Abierto</span>

                @else
                <span>Cerrado</span>
                @endif
            </td>
            <td>
                @if($incidencia->estado->id == 3)
                <span>En espera</span>
                @endif

                @if($incidencia->estado->id == 2)
                <span>Solucionado</span>
                @endif

                @if($incidencia->estado->id == 1)
                <span>Atendida (Sin solución)</span>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>


@endsection
<!--aqui el cuerpo del body-->