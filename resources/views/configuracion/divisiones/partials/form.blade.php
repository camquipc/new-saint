{!! Form::token() !!}

<div class="form-group col-lg-6 pl-2 ">
    {!! Form::label('departamento', 'División' ) !!}
    {!! Form::text('nombre', null , ['class' => 'form-control form-control-sm','placeholder' => 'Nombre ' , 'required'
    => 'true']) !!}
</div>

<div class="form-group col-lg-6 pl-2">
    {!! Form::label('status', 'Status' ) !!}
    {!! Form::select('status', ['' => 'Selecciona un Status' , 1 => 'Activo', 0 => 'Inactivo'] , null , ['class' =>
    'form-control form-control-sm' , 'required' => 'true']) !!}
</div>