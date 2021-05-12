@extends('reportes.plantilla')

@section('content')


<h4>Listado de Divisiones OTIC</h4>

<!-- text-transform: uppercase;-->
<br>


<table>
	<thead>
		<tr>
			<th style="width:2%;">#</th>
			<th style="width: 90%;">Nombre</th>
			<th style="width: 8%;">Estado</th>
		</tr>
	</thead>
	<tbody>
	<?php $contador = 1; ?>
    @foreach ($otic_departamentos as $division)

		<tr>
			<td> <?php echo $contador;?></td>
			<td>{{$division->nombre}}</td>
			<td style="text-align:center;">{{$division->status == 1 ? 'Activo' : 'Inactivo'}}</td>
		</tr>
	<?php $contador++;?>
    @endforeach
	</tbody>
</table>


@endsection
<!--aqui el cuerpo del body-->