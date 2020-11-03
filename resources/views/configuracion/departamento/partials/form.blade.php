{!! Form::token() !!}

<div class="form-group col-sm-6 pl-2 ">
    {!! Form::label('nombre', 'Nombre Unidad' ) !!}
    {!! Form::text('nombre', null , ['class' => 'form-control form-control-sm', 'required'
    => 'true', 'placeholder' => 'Nombre...']) !!}
</div>

<div class="form-group col-sm-6 pl-2">
    {!! Form::label('status', 'Status' ) !!}
    {!! Form::select('status', ['' => 'Seleccionar' , 1 => 'Activo', 0 => 'Inactivo'] , null , ['class' =>
    'form-control form-control-sm' , 'required' => 'true' ]) !!}
</div>

<!--<div class="form-group col-sm-6 pl-2 ">
    {!! Form::label('departamento', 'Usuarios Permitidos' ) !!}
    {!! Form::number('num_usuario_permitido', 5 , ['class' => 'form-control form-control-sm','placeholder' => '1' ,
    'required' =>
    'true'])
    !!}
</div>-->