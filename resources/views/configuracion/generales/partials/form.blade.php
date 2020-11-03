{!! Form::token() !!}

<div class="form-group col-lg-12 pl-2 ">
    {!! Form::label('departamento', 'Nombre (*)' ) !!}

    <select name="user_id" class="form-control form-control-sm">
        <option value="">Seleccionar un item</option>
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{ ucfirst($user->persona->p_nombre)}} {{ ucfirst($user->persona->p_apellido)}}
        </option>
        @endforeach
    </select>

</div>