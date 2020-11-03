{!! Form::token() !!}

<div class="form-group col-lg-6 pl-2 ">
    {!! Form::label('departamento', 'Motivo (*)' ) !!}
    {!! Form::text('motivo', null , ['class' => 'form-control form-control-sm','placeholder' => 'Nuevo motivo...' ,
    'required'
    => 'true']) !!}
</div>

<div class="form-group col-lg-6 pl-2">
    {!! Form::label('categoria_id', 'Pertenece a la División (*)' ) !!}
    <select name="categoria_id" id="" class="form-control form-control-sm" required="true">
        <option value="">Seleccione un item</option>
        @foreach ( $otic_departamentos as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
    </select>
</div>