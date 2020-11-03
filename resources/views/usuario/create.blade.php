@extends('layouts.app')

@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Módulo Usuarios</strong>
        </div>

        <div class="card-body card-block">
            @include('flash::message')
            @include('errors.erros')

            <div class="row">

                <div class="col-md-6">
                    <ul style="list-style: none; padding:0px;">
                        <li class="li_tam" style="padding-top: 2px;">
                            Nuevo Usuario
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <a style="font-size: 16px; color:black;" href="{{url('/usuarios')}}"
                        class="btn-sm btn-defaut pull-right " title="Listado de Usuarios">
                        <span class="fa fa-list-ul " aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            {!! Form::open(['route' => 'usuarios.store', 'autocomplete'=>'off'] ) !!}

            {!! Form::token() !!}
            <div class="card">
                <fieldset>
                    <legend style="width:130px;">
                        Datos Personales
                    </legend>
                    <div class="card-body card-block p-2">
                        @include('usuario.assets.input_datos_personales')
                    </div>
                    <strong>(*) Campo Requerido</strong>
                </fieldset>
            </div>

            <div class="card">
                <fieldset>
                    <legend style="width:130px;">
                        Datos Usuario
                    </legend>
                    <div class="card-body card-block p-2">
                        @include('usuario.assets.input_datos_usuario')
                    </div>
                    <strong>(*) Campo Requerido</strong>
                </fieldset>
            </div>

            <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                style="padding-left: 0px; margin-left: 0px;">
                <button type="submit" class="btn  btn-info  btn-sm">
                    <span class="fa fa-floppy-o" aria-hidden="true"></span> Registrar
                </button>

                <button type="reset" class="btn  btn-default btn-sm ">
                    <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
                </button>

                <button class="btn  btn-danger btn-sm" data-dismiss="modal">
                    <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
                </button>

            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
</div>

@endsection