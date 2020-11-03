<div class="row">

	{!! Form::token() !!}


	<!--DATOS PERSONALE DEL SOCIO-->

	<div class="form-group col-lg-4">
		{!! Form::label('usuario', 'Nombre de Usuario (*)' ) !!}
		{!! Form::text('usuario', null , ['class' => 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-sm-4">
		{!! Form::label('tipo', 'Tipo de Usuario (*)' ) !!}
		{!! Form::select('tipo',['' => 'Seleccionar' , 1 => 'Admin', 3 => 'Usuario',
		2 =>'Soporte Técnico', 4 => 'Basíco']
		, null , ['class' => 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-lg-4">
		{!! Form::label('status', 'Status' ) !!}
		<select name="status" class='form-control form-control-sm'>
			@if($usuario->status)
			<option value="1">Activo</option>
			<option value="0">Suspendido</option>
			@else
			<option value="0">Suspendido</option>
			<option value="1">Activo</option>
			@endif
		</select>
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('departamento', 'Departamento (*)' ) !!}
		{!! Form::select('departamento_id',$departamentos , null , ['class' => 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('departamento', 'Categoria (*)' ) !!}
		{!! Form::select('categoria_id',$categorias , null , ['class' => 'form-control
		form-control-sm']) !!}
	</div>



</div>