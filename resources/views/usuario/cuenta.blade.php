@extends('layouts.app')

@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Mis Datos</strong>
        </div>

        <div class="card-body card-block">

            @include('flash::message')
            @include('errors.erros')

            <br>

            <!--data del usuario para actuilizar-->
            <fieldset>
                <legend style="margin-left: 8px;width: 170px;">
                    {{ ucfirst($usuario->persona->p_nombre) }} {{ ucfirst($usuario->persona->p_apellido) }}
                </legend>

                <div class="card-body card-block ">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-personal"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> Datos Personales</a>

                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-seguridad"
                                role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="fa fa-lock" aria-hidden="true"></i> Seguridad</a>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <br>
                            <div class="card">
                                {!! Form::model($usuario->persona, ['route' => ['persona.update', $usuario->persona->id
                                ] ,
                                'method' =>
                                'PUT','autocomplete' =>'off']) !!}
                                <div class="card-body card-block p-2">
                                    @include('usuario.assets.input_datos_edit_personales')

                                    <input type="hidden" name="perfil">
                                </div>

                                <strong class="pull-right">(*) Campo Requerido</strong>

                                @include('assets.btn_form_update')

                                {!! Form::close() !!}
                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-seguridad" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>

                            <div class="card">
                                {!! Form::open(['url' => ['password_update', $usuario->id] ,'method' => 'put'] ) !!}

                                <div class="card-body card-block p-2">
                                    @include('usuario.assets.input_edit_password')
                                </div>

                                <strong class="pull-right">(*) Campo Requerido</strong>

                                @include('assets.btn_form_update')

                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

@endsection