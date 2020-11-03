<div class="row">
    {!! Form::token() !!}
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Nueva contraseña (*)' ) !!}
        {!! Form::password('password', ['class' => 'form-control form-control-sm']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Confirmar contraseña (*)' ) !!}
        {!! Form::password('password_confirmation',['class' => 'form-control
        form-control-sm']) !!}
    </div>
</div>