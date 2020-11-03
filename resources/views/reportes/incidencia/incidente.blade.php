@extends('reportes.plantilla')

@section('content')


<h4>REPORTE DE INCIDENTE</h4>

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


@endsection
<!--aqui el cuerpo del body-->