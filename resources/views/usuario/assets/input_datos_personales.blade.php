<div class="row">

	{!! Form::token() !!}


	<!--DATOS PERSONALE DEL SOCIO-->

	<div class="form-group col-lg-2">
		{!! Form::label('ci', 'Cédula (*)' ) !!}
		<input type="text" name="ci" class="form-control form-control-sm" placeholder="21342187"
			onblur="setUsuarioPassword('cedula');" id="cedula" maxlength="8" minlength="6"
			onkeypress="return 	setOnliNumber(event);">

		<!--	{!! Form::text('ci', null , ['class' => 'form-control form-control-sm', 'placeholder' => '21342187', 'maxlength'
		=> '8', 'minlength' => '6', 'onblur' => 'setUsuarioPassword("ci")', 'id' => 'ci', 'onkeypress'=> 'return
		setOnliNumber(event)'])
		!!}-->
	</div>

	<div class="form-group col-lg-5">
		{!! Form::label('p_nombre', 'Nombres (*)' ) !!}
		{!! Form::text('p_nombre', null , ['class' => 'form-control form-control-sm', 'placeholder' => 'Pedro José' ,
		'onkeypress' => 'return setOnliString(event);', 'maxlength' => 20])
		!!}
	</div>

	<div class="form-group col-lg-5">
		{!! Form::label('p_apellido', 'Apellidos (*)' ) !!}
		{!! Form::text('p_apellido', null , ['class' => 'form-control form-control-sm','placeholder' =>'Caraballo C' ,
		'onkeypress' => 'return setOnliString(event);', 'maxlength' => 20])
		!!}
	</div>

	<div class="form-group col-lg-3">
		{!! Form::label('fecha_n', 'Fecha de Nacimiento (*)' ) !!}
		{!! Form::date('fecha_n', null , ['class' => 'form-control form-control-sm', 'max' => '2016-12-31', 'min' =>
		'1960-12-13']); !!}
	</div>

	<div class="form-group col-lg-3">
		{!! Form::label('sexo', 'Sexo' ) !!}
		{!! Form::select('sexo', ['' => 'Selecciona un Sexo' , 'm' => 'Maculino', 'f' => 'Femenino'] , null , ['class'
		=> 'form-control form-control-sm']) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('correo', 'Correo' ) !!}
		{!! Form::email('correo', null , ['class' => 'form-control form-control-sm', 'placeholder' =>
		'Pedro@gmail.com'])
		!!}
	</div>

</div>