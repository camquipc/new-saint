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

    /*
    body:after {
        content: "";
        font-size: 15em;
        color: rgba(52, 166, 214, 0.4);
        z-index: 9999;
        background: url('./img/sait.png');
        opacity: 0.5;

        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        -webkit-pointer-events: none;
        -moz-pointer-events: none;
        -ms-pointer-events: none;
        -o-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
    */
</style>



<!--
REPÚBLICA BOLIVARIANA DE VENEZUELA
MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA
UNIVERSIDAD POLITÉCNICA TERRITORIAL DE PARIA
COORDINACIÓN DE ADMISIÓN, SEGUIMIENTO, REGISTRO Y CONTROL DE ESTUDIOS
-->


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

    @yield('content')

    <br>
    <p style="text-align: center;position: fixed; bottom: 160px;">__________________________<br>
        {{ ucfirst($newDirectorSAIT[0]->nombre) }}
        {{ ucfirst($newDirectorSAIT[0]->apellido) }} <br> Director OTIC </p>

    <div style="position: fixed; bottom: 10px; font-size: 10px;">
        <b>
            {!!\Carbon\Carbon::now()->format("d-m-Y") !!} {!! \Carbon\Carbon::now()->format("h:i:s a") !!}
        </b>
        <span style="float: right;"> Generado por:
            <b>{{Auth::user()->persona->p_nombre}} {{Auth::user()->persona->p_apellido}}</b>
        </span>
    </div>

</div>
<!--

Dirección: Canchunchú Florido,
 Carretera Nacional vía El Pilar, Carúpano - Edo. 
 SucreTeléfonos: (0294) 3324696. Fax: (0294) 3325080 - 3325312. 
 Email: iutcarupano@cantv.net. RIF: G-20006083-2

-->