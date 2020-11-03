<!-- Modal -->
<div class="modal fade modal-close" id="modalCreateIncidente" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Módulo Incidentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'incidencia', 'autocomplete'=>'off' , 'id' => 'test'] ) !!}

                <div class="card">
                    <fieldset>
                        <legend>
                            Nuevo Incidente
                        </legend>
                        <div class="card-body card-block p-2">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    {!! Form::label('dirigido', 'Dirigido a (*)' ) !!}
                                    <select name="dirigido" id="d" onchange="getMotivos(this)"
                                        class="form-control form-control-sm" required="true">
                                        <option value="">Seleccionar un item</option>
                                        @foreach ($categorias as $categoria)
                                        @if($categoria->nombre != 'Directivo' && $categoria->nombre != 'Ninguno')
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    {!! Form::label('motivo', 'Motivo(*)' ) !!}
                                    <select name="motivo_id" class="form-control form-control-sm select_motivos"
                                        required="true">
                                        <option value="">Seleccionar un item</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12">
                                    {!! Form::label('detalle', 'Más Detalle' ) !!}
                                    {!! Form::textarea('detalle', null , ['class' =>
                                    'form-control
                                    form-control-sm', 'lang'=>'es']) !!}
                                </div>
                            </div>
                        </div>
                        <strong>(*) Campo Requerido</strong>
                    </fieldset>
                </div>


            </div>

            <div class="modal-footer">
                <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                    style="padding-left: 0px; margin-left: 0px;">
                    <button type="button" class="btn  btn-info btn-sm "
                        onclick="sendFormIncidente('incidencia','POST','#test')">
                        <span class="fa fa-floppy-o" aria-hidden="true"></span> Enviar
                    </button>

                    <button type="reset" class="btn  btn-default btn-sm">
                        <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
                    </button>

                    <button class="btn  btn-danger btn-sm " data-dismiss="modal">
                        <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
                    </button>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>