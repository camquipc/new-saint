<div class="row">

	<div class="col-md-6">
		<ul style="list-style: none; padding:0px;">
			<li class="li_tam">
				Listado de Unidades
			</li>
		</ul>
	</div>
	<div class="col-md-6">
		<a style="font-size: 18px" href="#" data-toggle="modal" data-target="#modalDepartamento"
			class="btn-sm  pull-right " title="Nuevo Departamento">
			<span class="fa fa-plus-circle" aria-hidden="true"></span>
		</a>
	</div>
</div>
<table class="bootstrap-data-table table table-striped ">
	<thead>
		<tr>
			<th width="10">#</th>
			<th>Nombre</th>
			<th width="15"></th>
			<th width="10">Estado</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($departamentos as $departamento)
		<tr>
			<td width="10" class="uppercase">{{ $departamento->id }}</td>
			<td class="uppercase">{{ $departamento->nombre }}</td>
			<td class="uppercase"></td>

			<td class="uppercase text-center">
				@if ($departamento->status == 1)
				<span style="color: #55ce63;">
					<i class="fa fa-check-square"></i>
				</span>

				@else
				<span style="color: #55ce63;">&#xf05e;</span>
				@endif
			</td>
			<td width="20">

				<div class="btn-group" role="group" aria-label="Basic example">

					<a class="btn btn-sm " title="Actualizar" data-toggle="modal" data-target="#exampleModalLabelEditar"
						data-value="{{$departamento->id}},{{$departamento->nombre}},{{$departamento->status}},{{ $departamento->num_usuario_permitido }},1"
						onclick="getInputValueModal(this)">
						<i class="fa fa-edit"></i>

					</a>


				</div>

			</td>
		</tr>

		@endforeach

	</tbody>
</table>

@include('configuracion.departamento.partials.modal_departamento')
@include('configuracion.departamento.partials.modal_form_editar')