<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
    html {
        margin: 10pt 25pt 25pt 25pt;
        font-family: Arial, Sans-serif;
        font-size: 10px;
        text-transform: uppercase;
    }


    table {
        width: 100%;
        text-align: left;
        border-collapse: collapse;
        text-transform: uppercase;

    }

    th {
        font-weight: normal;
        padding-left: 4px;
        background: #ddd;
        border: 1px solid #000;
    }

    td {
        padding-left: 4px;
        color: #000;
        border: 1px solid #000;
    }

    h4 {
        text-align: center;

    }

    #fecha {
        text-align: right;
        margin-bottom: 20px;

    }

    img {
        width: 100%;
        height: 50px;
        margin-bottom: 10px;
    }

    span {
        font-weight: bold;
    }
</style>

<!--pagina 01-->
<div style="width: 100%; margin: 0px auto;">
    <!--encabezado -->

    <img src="./img/lo.png">

    <p style="text-align: left; margin-bottom: 20px;">
        REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
        MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA <br>
        UNIVERSIDAD POLITÉCNICA TERRITORIAL DE PARIA <br>
        Oficina de Tecnología de Información y Comunicación<br>
        {{ $sistema->sistema_detalle }}
    </p>

    <p id="fecha">
        Carúpano, {!! \Carbon\Carbon::now()->format("d-m-Y") !!}
    </p>


    <h4>INFORME TÉCNICO</h4>

    <!-- text-transform: uppercase;-->

    <br>

    <ul style="list-style: none; padding-left: 0px;">
        <li>
            Incidente Código: <span>{{ $incidencia->codigo }}</span>
        </li>
        <li>
            Dirigido a: <span>{{$incidencia->motivo->categoria->nombre}}</span>
        </li>

    </ul>

    <br>
    <table>

        <tr>
            <td>
                Reportado por
            </td>
            <td>
                <span>{{$incidencia->user->persona->p_nombre }} {{$incidencia->user->persona->p_apellido }}</span>
            </td>
        </tr>

        <tr>
            <td>
                Departamento
            </td>
            <td>
                <span>{{$incidencia->user->departamento->nombre}}</span>
            </td>
        </tr>

        <tr>
            <td>
                Motivo:
            </td>
            <td>
                <span>{{$incidencia->motivo->nombre}}</span>
            </td>
        </tr>

        @if($incidencia->user_asignado != '')
        <tr>
            <td>
                Asignado a:
            </td>
            <td>
                <span>{{$incidencia->user_asignado->persona->p_nombre }}
                    {{$incidencia->user_asignado->persona->p_apellido }}</span>
            </td>
        </tr>
        @endif
        <tr>
            <td>
                Detalle:
            </td>
            <td>
                <span>{{$incidencia->detalle}}</span>
            </td>
        </tr>

    </table>
    <br>
    <table>

        <tr>
            <td>
                Estado
            </td>

            <td>
                @if(!$incidencia->verificada)
                <span>Incidente abierto</span>

                @else
                <span>Incidente cerrado</span>
                @endif
            </td>
        </tr>

        <tr>
            <td>
                Condición
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
    </table>
    <br>
    <table>

        <tr>
            <td>
                Tiempo de respuesta
            </td>

            <td>
                5 dias
            </td>
        </tr>

        <tr>
            <td>
                Observaciónes
            </td>
            <td>
                10
            </td>

        </tr>

        <tr>
            <td>
                Nota técnica
            </td>
            <td>

                Niguna nota técnica....
            </td>
        </tr>
    </table>

    <p style="text-align: left; margin-bottom: 20px;line-height: 2;">
        &nbsp; &nbsp; &nbsp; POR MEDIO DE LA PRESENTE SE HACE CONSTAR QUE EL REPORTE DEL INCIDENTE N°
        {{ $incidencia->codigo }} FUE
        RECIBIDO Y ATENDIDO DE MANERA SATISFATORIA POR EL TECNICO ASIGNDO.
    </p>




    <div style="position: fixed; bottom: 10px; font-size: 10px;">
        <b>
            {!!\Carbon\Carbon::now()->format("d-m-Y") !!} {!! \Carbon\Carbon::now()->format("h:i:s a") !!}
        </b>
        <span style="float: right;"> Generado por:
            <b>{{Auth::user()->persona->p_nombre}} {{Auth::user()->persona->p_apellido}}</b>
        </span>
    </div>

</div>


<!--<div style="page-break-after:always;">
</div>-->