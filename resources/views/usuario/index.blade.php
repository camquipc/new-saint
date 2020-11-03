@extends('layouts.app')

@section('content')


<div class="col-lg-12">

	<div class="card">
		<div class="card-header">
			<strong class="card-title">Módulo Usuarios</strong>
		</div>

		<div class="card-body card-block">
			@include('flash::message')
			@include('errors.erros')

			<div class="row">

				<div class="col-md-6">
					<ul style="list-style: none; padding:0px;">
						<li class="li_tam" style="padding-top: 2px;">
							Listado de Usuarios
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<!--data-toggle="modal" data-target="#modalCreateUser"-->
					<a style="font-size: 18px" href="{{route('usuarios.create')}}" class="btn-sm  pull-right "
						title="Nuevo Usuario">
						<span class="fa fa-plus-circle" aria-hidden="true"></span>
					</a>
				</div>
			</div>


			<table id="bootstrap-data-table-export " class="table table-striped  bootstrap-data-table">
				<thead>
					<tr>
						<th style="text-align: left; padding-left: 2px;">#</th>
						<th style="text-align: left; padding-left: 0px;" class="uppercase">Nombre Apellido</th>
						<th style="text-align: left; padding-left: 0px;" class="uppercase">Usuario</th>
						<th style="text-align: left; padding-left: 0px;" class="uppercase">Departamento</th>
						<th style="text-align: left; padding-left: 0px;" class="uppercase">División</th>
						<th style="text-align: left; padding-left: 0px;" class="uppercase">Tipo</th>
						<th style="text-align: center; padding-left: 0px;" class="uppercase">Status</th>
						<th width="20"></th>
					</tr>
				</thead>
				<tbody>
					<?php $contador = 1; ?>
					@foreach ($usuarios as $usuario)
					@if (Auth::user()->id != $usuario->id && $usuario->tipo != 5)

					<tr>
						<td class="uppercase"><?php echo $contador; ?></td>

						<td class="uppercase">{{ ucfirst($usuario->persona->p_nombre) }}
							{{ ucfirst($usuario->persona->p_apellido) }}</td>
						<td class="uppercase">{{ $usuario->usuario }}</td>
						<td class="uppercase">{{ ucfirst($usuario->departamento->nombre) }}</td>
						<td class="uppercase">{{ ucfirst($usuario->categoria->nombre) }}</td>
						<td class="uppercase">
							@include('usuario.assets.usuarios_tipo', ['usuario' => $usuario->tipo])
						</td>
						<td class="uppercase text-center">
							@if ($usuario->status == 1)
							<span style="color: #55ce63;">
								<i class="fa fa-check-square"></i>
							</span>

							@else
							<span style="color:red;"><i class="fa fa-ban"></i></span>
							@endif
						</td>
						<td>

							<div class="btn-group" role="group" aria-label="Basic example">
								<!--<a class="btn  btn-sm" data-toggle="modal" data-target="#modalUpdateUser"
									title="Actualizar Usuario">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</a>-->

								<a class="btn  btn-sm" href="{{route('usuarios.edit' , $usuario->id )}}"
									title="Actualizar Usuario" style="color:black;">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</a>

								@if($usuario->status == 1)
								<a class="btn  btn-sm" href="{{url('/activar', $usuario->id)}}" title="Bloquear Usuario"
									style="color:black;" onclick="return confirm('¿Realmente desea continuar?');">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</a>
								@else
								<a class="btn  btn-sm" href="{{url('/activar', $usuario->id)}}"
									title="Desbloquear Usuario" style="color:black;"
									onclick="return confirm('¿Realmente desea continuar?');">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</a>
								@endif

								<!--data-toggle="modal" data-target="#modalUpdatePasswordUser"-->
								<a class="btn  btn-sm" title="Resetear Password"
									href="{{url('/password/reset', $usuario->id)}}" style="color:black;"
									onclick="return confirm('¿Realmente desea continuar?');">
									<i class="fa fa-key" aria-hidden="true"></i>
								</a>
							</div>
						</td>
					</tr>
					<?php $contador++;?>
					@endif

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@include('usuario.assets.create_user_modal')
@include('usuario.assets.update_user_modal')
@include('usuario.assets.update_password_user_modal')
@endsection