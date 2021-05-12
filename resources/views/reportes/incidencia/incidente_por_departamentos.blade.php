@extends('reportes.plantilla')

@section('content')


<h4>REPORTE DE DEPARTAMENTO CON NÚMEROS DE USUARIOS</h4>

<!-- text-transform: uppercase;-->
<br>


<table>
	<thead>
		<tr>
			<th style="width:2%;">#</th>
			<th style="width: 90%;">Departamentos</th>
			<th style="width: 8%;">Estado</th>
		</tr>
	</thead>
	<tbody>
	<?php $contador = 1; ?>
    @foreach ($departamentos as $departamento)

		<tr>
			<td> <?php echo $contador;?></td>
			<td>{{$departamento->nombre}}</td>
			<td style="text-align:center;">{{$departamento->status == 1 ? 'Activo' : 'Inactivo'}}</td>
		</tr>
	<?php $contador++;?>
    @endforeach
	</tbody>
</table>


@endsection
<!--aqui el cuerpo del body-->