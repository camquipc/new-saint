{!! Form::token() !!}

<div class="form-group col-lg-12 pl-2 ">
    {!! Form::label('departamento', 'Condición (*)' ) !!}
    {!! Form::text('estado', null , ['class' => 'form-control form-control-sm','placeholder' => 'Nuevo estado...' ,
    'required'
    => 'true']) !!}
</div>

<!--<div class="form-group col-lg-6 pl-2">
    {!! Form::label('status', 'Status' ) !!}
    {!! Form::select('status', ['' => 'Selecciona un Status' , 1 => 'Activo', 0 => 'Inactivo'] , null , ['class' =>
    'form-control form-control-sm' , 'required' => 'true']) !!}
</div>-->