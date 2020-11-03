@extends('reportes.plantilla')

@section('content')


<h4>REPORTE DE DEPARTAMENTO</h4>

<!-- text-transform: uppercase;-->
<br>

<table style="text-align: right;">
	<tr colspan="12">
		<th style="text-align: center;">
			NÚMERO DE INCIDENTES POR DEPARTAMENTO
		</th>
	</tr>
</table>
<table>
	<thead>
		<tr>
			<th style="width:2%;">#</th>
			<th style="width: 90%;">Departamento</th>
			<th style="width: 8%;">Incidente</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Informática</td>
			<td style="text-align:center;">20</td>
		</tr>
	</tbody>
</table>


@endsection
<!--aqui el cuerpo del body-->