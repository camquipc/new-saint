<div class="row">

    {!! Form::token() !!}


    <!--DATOS PERSONALE DEL SOCIO-->

    <div class="form-group col-lg-2">
        {!! Form::label('ci', 'Cédula (*)' ) !!}
        <!--<input type="text" name="ci" class="form-control form-control-sm" placeholder="21342187"
            onkeyup="getPersona('cedula');" id="cedula" maxlength="8" minlength="6">-->
        @if(Auth::user()->tipo != 1)
        {!! Form::text('ci', null , ['class' => 'form-control form-control-sm', 'placeholder' => '21342187', 'maxlength'
        => '8', 'minlength' => '6' , 'readonly'])
        !!}
        @else
        {!! Form::text('ci', null , ['class' => 'form-control form-control-sm', 'placeholder' => '21342187', 'maxlength'
        => '8', 'minlength' => '6', 'onblur' => 'setUsuarioPassword(this)'])
        !!}
        @endif
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('fecha_n', 'Fecha de Nacimiento (*)' ) !!}
        @if(Auth::user()->tipo != 1)
        {!! Form::date('fecha_n', null , ['class' => 'form-control form-control-sm','max' => '2000-01-01', 'min' =>
        '1960-01-01', 'readonly']); !!}
        @else
        {!! Form::date('fecha_n', null , ['class' => 'form-control form-control-sm','max' => '2000-01-01', 'min' =>
        '1960-01-01']); !!}
        @endif
    </div>

    <div class="form-group col-lg-2">
        {!! Form::label('sexo', 'Sexo' ) !!}
        @if(Auth::user()->tipo != 1)

        {!! Form::text('sexo', null , ['class'
        => 'form-control form-control-sm', 'readonly']) !!}
        @else
        {!! Form::select('sexo', [ 'm' => 'Maculino', 'f' => 'Femenino'] , null , ['class'
        => 'form-control form-control-sm']) !!}
        @endif
    </div>

    <div class="form-group col-sm-5">
        {!! Form::label('correo', 'Correo' ) !!}
        {!! Form::email('correo', null , ['class' => 'form-control form-control-sm', 'placeholder' =>
        'Pedro@gmail.com'])
        !!}
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('p_nombre', 'Nombres (*)' ) !!}
        @if(Auth::user()->tipo != 1)
        {!! Form::text('p_nombre', null , ['class' => 'form-control form-control-sm', 'placeholder' => 'Pedro
        José','readonly'])
        !!}
        @else
        {!! Form::text('p_nombre', null , ['class' => 'form-control form-control-sm', 'placeholder' => 'Pedro José'])
        !!}
        @endif
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('p_apellido', 'Apellidos (*)' ) !!}
        @if(Auth::user()->tipo != 1)
        {!! Form::text('p_apellido', null , ['class' => 'form-control form-control-sm','placeholder' =>'Caraballo C',
        'readonly'])
        !!}
        @else
        {!! Form::text('p_apellido', null , ['class' => 'form-control form-control-sm','placeholder' =>'Caraballo C'])
        !!}
        @endif
    </div>

</div>