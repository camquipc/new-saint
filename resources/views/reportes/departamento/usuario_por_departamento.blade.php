@extends('reportes.plantilla')

@section('content')


<h4>REPORTE DE DEPARTAMENTO</h4>

<!-- text-transform: uppercase;-->
<br>

<table style="text-align: right; font-size: 12px;">
    <tr colspan="12">
        <th>
            <center>NÚMERO DE USUARIO POR DEPARTAMENTO</center>
        </th>
    </tr>
</table>
<table>
    <thead>
        <tr>
            <th width="10">#</th>
            <th style="width: 80px;">Departamento</th>

            <th style="width: 10px;">Usuario</th>

        </tr>
    </thead>
    <tbody>
        <?php $num = 1;?>
        @foreach ($departamentos as $departamento)
        <tr>
            <td>{{ $num }}</td>
            <td>{{ $departamento->nombre }}</td>
            <td>{{ $departamento->usuario }}</td>
        </tr>
        <?php $num++; ?>
        @endforeach
    </tbody>
</table>


@endsection
<!--aqui el cuerpo del body-->