@extends('layouts.app')

@section('content')


<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Historial de Usuario</strong>
		</div>
		<div class="card-body card-block">
		    @include('flash::message')
			<div class="row pb-3">
				<div class="col-md-4">
					<ul style="list-style: none;padding:0px;">
						<li>
							Historial de Usuario
						</li>
					</ul>
				</div>
				<div class="col-md-8">
					<form class="form-inline pull-right" method="POST" action="{{route('historial_filter')}}">
					
                        {{ csrf_field() }}
						<p class="mt-3 mr-3"> Filtro de busqueda </p>

						<input type="date" name="desde" class="form-control form-control-sm mr-2" style="width:170px;"
							placeholder="Desde" require>

						<input type="date" name="hasta" class="form-control form-control-sm mr-2" style="width:170px;"
							placeholder="Hasta" require>

						<select class="form-control form-control-sm mr-2" name="user">
							<option value="">Usuario</option>
							@foreach ($users as $user)
							 <option value="{{$user->id}}">{{$user->usuario}}</option>
							@endforeach
						</select>

						<button type="submit" class="btn-info  btn-sm pt-1 pb-1 pl-3 pr-3">
							<i class="fa fa-search-plus" aria-hidden="true" style="font-size:16px;"></i>
						</button>
					</form>
					<a style="font-size: 16px;" href="{{url('/historial')}}" class="btn-sm btn-defaut pull-right mt-2 mr-2"
                        title="Todo el historial">
                        <span class="fa fa-list-ul " aria-hidden="true"></span>
                    </a>
					@if(count($historials) > 0)
					<a style="font-size: 16px;" class="btn-sm btn-defaut pull-right mt-2" title="Generar reporte" 
					href="{{$query}}">
                        <span class="fa fa-print " aria-hidden="true"></span>
                    </a>
					@endif
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