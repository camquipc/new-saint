<!-- Modal -->
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::open(['route' => 'usuarios.store', 'autocomplete'=>'off'] ) !!}

                {!! Form::token() !!}
                <div class="card">
                    <fieldset>
                        <legend>
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
                        <legend>
                            Datos Usuario
                        </legend>
                        <div class="card-body card-block p-2">
                            @include('usuario.assets.input_datos_usuario')
                        </div>
                        <strong>(*) Campo Requerido</strong>
                    </fieldset>
                </div>

            </div>

            <div class="modal-footer">
                <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                    style="padding-left: 0px; margin-left: 0px;">
                    <button type="submit" class="btn  btn-info  ">
                        <span class="fa fa-floppy-o" aria-hidden="true"></span> Registrar
                    </button>

                    <button type="reset" class="btn  btn-default ">
                        <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
                    </button>

                    <button class="btn  btn-danger " data-dismiss="modal">
                        <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
                    </button>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>