<!-- Modal -->
<div class="modal fade" id="modalUpdateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actulizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">
                            Datos Personales</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">
                            Datos del Usuario</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <br>

                        {!! Form::model($usuario->persona, ['route' => ['persona.update', $usuario->persona->id ] ,
                        'method' =>
                        'PUT']) !!}

                        <div class="card">

                            <fieldset>
                                <div class="card-body card-block p-2">
                                    @include('usuario.assets.input_datos_personales')
                                </div>

                                <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                                    style="padding-left: 0px; margin-left: 0px;">

                                    <button type="submit" class="btn btn-info "
                                        onclick="return confirm('¿Realmente desea continuar?');">
                                        <span class="fa fa-refresh" aria-hidden="true"></span> Actualizar
                                    </button>

                                    <button type="reset" class="btn  btn-default ">
                                        <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
                                    </button>
                                </div>
                            </fieldset>

                        </div>
                        {!! Form::close() !!}


                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <br>

                        {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario ] , 'method' => 'PUT']) !!}

                        <div class="card">
                            <fieldset>
                                <div class="card-body card-block p-2">
                                    @include('usuario.assets.input_datos_edit_usuario')
                                </div>

                                <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                                    style="padding-left: 0px; margin-left: 0px;">
                                    <button type="submit" class="btn btn-info "
                                        onclick="return confirm('¿Realmente desea continuar?');">
                                        <span class="fa fa-refresh" aria-hidden="true"></span> Actualizar
                                    </button>

                                    <button type="reset" class="btn  btn-default ">
                                        <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
                                    </button>
                                </div>
                            </fieldset>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>