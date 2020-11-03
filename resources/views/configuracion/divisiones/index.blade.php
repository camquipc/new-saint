<div class="row">
	<div class="col-md-6">
		<ul style="list-style: none; padding:0px;">
			<li class="li_tam">
				Listado de Divisiones OTIC
			</li>
		</ul>
	</div>
	<div class="col-md-6">
		<a style="font-size: 18px" href="#" data-toggle="modal" data-target="#modalOticDepartamento"
			class="btn-sm  pull-right " title="Nuevo Departamento">
			<span class="fa fa-plus-circle" aria-hidden="true"></span>
		</a>
	</div>
</div>

<table class="bootstrap-data-table table table-striped ">
	<thead>
		<tr>
			<th width="10" style="text-align: left;">#</th>
			<th style="text-align: left; width:80%;" colspan="2">Nombre</th>
			<th></th>

			<th style="text-align: center;">Estado</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($otic_departamentos as $division)
		<tr>
			<td width="10">{{ $division->id }}</td>
			<td colspan="2" class="uppercase">{{ $division->nombre }}</td>
			<th></th>

			<td class="uppercase text-center">
				@if ($division->status == 1)
				<span style="color: #55ce63;">
					<i class="fa fa-check-square"></i>
				</span>

				@else
				<span style="color: #55ce63;">&#xf05e;</span>
				@endif
			</td>
			<td width="30">
				<a class="btn btn-sm " title="Actualizar" data-toggle="modal" data-target="#divisionModalEditar"
					data-value="{{$division->id}},{{$division->nombre}},{{$division->status}},0,2"
					onclick="getInputValueModal(this)">
					<i class="fa fa-edit"></i>
				</a>

			</td>
		</tr>

		@endforeach

	</tbody>
</table>

@include('configuracion.divisiones.partials.modal_division')
@include('configuracion.divisiones.partials.modal_form_editar')