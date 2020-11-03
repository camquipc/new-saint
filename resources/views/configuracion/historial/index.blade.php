@extends('layouts.app')

@section('content')


<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Historial de Usuario</strong>
		</div>
		<div class="card-body card-block">
			<div class="row">
				<div class="col-md-6">
					<ul style="list-style: none;padding:0px;">
						<li>
							Historial de Usuario
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<!--<a style="font-size: 18px" data-toggle="modal" data-target="#exampleModa30"
						class="btn-sm  pull-right " title="Filtar Historial">
						<span class="fa fa-filter" aria-hidden="true"></span> </a>-->

					<form class="form-inline pull-right">
						<p class="mt-3 mr-3"> Filtro de busqueda </p>
						<!--<input type="text" class="form-control form-control-sm mr-2 " style="width:70px;" placeholder="Codigo">-->

						<select class="form-control form-control-sm mr-2">
							<option value="">Usuario</option>
						</select>

						<select class="form-control form-control-sm mr-2">
							<option value="">Departamento</option>
						</select>

						<input type="date" class="form-control form-control-sm mr-2" style="width:170px;"
							placeholder="Desde">

						<input type="date" class="form-control form-control-sm mr-2" style="width:170px;"
							placeholder="Hasta">

						<select class="form-control form-control-sm mr-2" style="width:85px;">
							<option value="">Estado</option>
						</select>

						<button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
							<i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
						</button>
					</form>
				</div>
			</div>
			<table id="bootstrap-data-table1" class=" bootstrap-data-table table table-striped ">
				<thead>
					<tr>
						<th width="10">#</th>
						<th class="uppercase">Usuario</th>
						<th class="uppercase">Operación</th>
						<th class="uppercase">Fecha</th>
						<th width="10" class="uppercase">IP</th>
						<th width="10" class="uppercase" style="text-align: right;">HostName</th>

					</tr>
				</thead>
				<?php $i = 0;?>
				<tbody>
					@if(isset($historials))
					@foreach ($historials as $historial)
					<tr>
						<td width="10" class="uppercase">{{ $i+1 }}</td>
						<td class="uppercase">{{ $historial->usuario}} </td>
						<td class="uppercase">{{ $historial->operacion }}</td>
						<td class="uppercase">{!! \Carbon\Carbon::parse($historial->fecha)->format("d-m-Y") !!}</td>
						<td width="10" class="uppercase">{{ $historial->ip }}</td>
						<td width="10" class="uppercase" style="text-align: right;">{{ $historial->so }}</td>
					</tr>

					<?php $i++;?>
					@endforeach
					@endif
				</tbody>

			</table>

		</div>
	</div>
</div>
</div>
@include('configuracion.historial.modal')
@endsection