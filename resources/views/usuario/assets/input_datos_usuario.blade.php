<div class="row">

	<div class="form-group col-sm-2">
		{!! Form::label('usuario', 'Usuario (*)' ) !!}
		{!! Form::text('usuario', null , ['class' => 'form-control form-control-sm' , 'id' => 'usuario']) !!}
	</div>

	<div class="form-group col-sm-2">
		{!! Form::label('password', 'Password (*)' ) !!}
		{!! Form::password('password', ['class' => 'form-control form-control-sm' , 'id' => 'password']) !!}
	</div>

	<div class="form-group col-sm-3">
		{!! Form::label('departamento', 'Departamento (*)' ) !!}
		{!! Form::select('departamento_id',$departamentos , null , ['class' => 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-sm-2">
		{!! Form::label('tipo', 'Tipo (*)' ) !!}
		{!! Form::select('tipo',['' => 'Seleccionar' , 1 => 'Admin', 3 => 'Usuario',
		2 =>'Soporte', 4 => 'Basíco']
		, null , ['class' => 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-sm-3">
		{!! Form::label('departamento', 'División (*)' ) !!}
		{!! Form::select('categoria_id',$categorias , 5 , ['class' => 'form-control
		form-control-sm']) !!}
	</div>

</div>