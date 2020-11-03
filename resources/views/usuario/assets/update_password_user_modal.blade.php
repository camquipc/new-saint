<!-- Modal -->
<div class="modal fade" id="modalUpdatePasswordUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdatePasswordUser">Actualizar Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <fieldset>
                        <legend>
                            Francisco Campos
                        </legend>
                        <div class="card-body card-block p-2">

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::label('password', 'Password (*)' ) !!}
                                    {!! Form::password('password', ['class' => 'form-control form-control-sm']) !!}
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::label('password_confirmation', 'Confirmar Password (*)' ) !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control
                                    form-control-sm']) !!}
                                </div>
                            </div>

                        </div>

                    </fieldset>


                    <div class="btn-group col-md-12 mb-3 mt-3" role="group" aria-label="Basic example"
                        style="padding-left: 0px; margin-left: 0px;">

                        <button type="submit" class="btn btn-info ">
                            <span class="fa fa-refresh" aria-hidden="true"></span> Actualizar
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

        </div>

    </div>
</div>