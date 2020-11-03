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

            <!--botones de navegación-->
            <div class="row">
                <div class="col-md-6">
                    <ul style="list-style: none; padding:0px;">
                        <li class="li_tam" style="padding-top: 2px;">
                            Actualizar Usuario
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <!--<a style="font-size: 16px" href="#" data-toggle="modal" data-target="#modalCreateUser"
                        class="btn-sm  pull-right " title="Nuevo Usuario">
                        <span class="fa fa-plus-circle" aria-hidden="true"></span>
                    </a>-->

                    <a style="font-size: 16px; color:black;" href="{{url('/usuarios')}}"
                        class="btn-sm btn-defaut pull-right " title="Listado de Usuarios">
                        <span class="fa fa-list-ul " aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <!--botones de navegación-->

            <br>

            <!--data del usuario para actuilizar-->
            <fieldset>
                <legend style="margin-left: 8px;width: 170px;">
                    {{ucfirst($usuario->persona->p_nombre )}} {{ucfirst($usuario->persona->p_apellido) }}
                </legend>

                <div class="card-body card-block ">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-personal"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> Datos Personales</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-usuario"
                                role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="fa fa-user" aria-hidden="true"></i> Datos del Usuario</a>
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
                                </div>

                                <strong class="pull-right">(*) Campo Requerido</strong>

                                @include('assets.btn_form_update')

                                {!! Form::close() !!}
                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-usuario" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>

                            <div class="card">
                                {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id ] , 'method' =>
                                'PUT', 'autocomplete' =>'off'])
                                !!}
                                <div class="card-body card-block p-2">
                                    @include('usuario.assets.input_datos_edit_usuario')
                                </div>

                                <strong class="pull-right">(*) Campo Requerido</strong>

                                @include('assets.btn_form_update')

                                {!! Form::close() !!}
                            </div>

                        </div>


                        <div class="tab-pane fade" id="nav-seguridad" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>

                            <div class="card">
                                <div class="card-body card-block p-2">

                                    <a class="btn btn-warning btn-sm" title="Resetear Password"
                                        href="{{url('/password/reset', $usuario->id)}}"
                                        onclick="return confirm('¿Realmente desea continuar?');">
                                        Resetear Password <i class="fa fa-key" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

@endsection