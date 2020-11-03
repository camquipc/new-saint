<!-- Modal -->
<div class="modal fade modal-close" id="modalCreateIncidenteTercero" tabindex="-1" role="dialog"
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

                {!! Form::open(['url' => 'incidencia', 'autocomplete'=>'off' , 'id' => 'test_'] ) !!}

                <div class="card">
                    <fieldset>
                        <legend>
                            Nuevo Incidente a Terceros
                        </legend>
                        <div class="card-body card-block p-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span id="sp_msj" style="color:red;" class="mt-2 mb-2"></span>
                                </div>
                                <div class="form-group col-lg-2">
                                    {!! Form::label('user_departamento_ci', 'Cédula (*)' ) !!}
                                    {{-- {!! Form::text('user_departamento_ci', null , ['class' => 'form-control
                                    form-control-sm','placeholder' => '12345678']) !!} --}}

                                    <input type="text" name="user_departamento_ci" class="form-control form-control-sm"
                                        onblur="getPersona(this);" onkeypress="return 	setOnliNumber(event);"
                                        maxlength="8" minlength="6">
                                </div>

                                <div class="form-group col-lg-5">
                                    {!! Form::label('dirigido', 'Dirigido a (*)' ) !!}
                                    <select name="dirigido" id="d" onchange="getMotivos(this)"
                                        class="form-control form-control-sm" required>
                                        <option value="">Select item</option>
                                        @foreach ($categorias as $categoria)
                                        @if($categoria->nombre != 'Directivo' && $categoria->nombre != 'Ninguno')
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-5">
                                    {!! Form::label('motivo', 'Motivo(*)' ) !!}
                                    <select name="motivo_id" class="form-control form-control-sm select_motivos"
                                        required>
                                        <option value="">Select item</option>
                                    </select>
                                </div>

                                {{--<div class="form-group col-lg-4">
                                    {!! Form::label('dirigido', 'Dirigido a (*)' ) !!}
                                    {!! Form::select('dirigido',$categorias
                                    , null , ['class' => 'form-control form-control-sm']) !!}
                                </div>

                                <div class="form-group col-lg-6">
                                    {!! Form::label('motivo', 'Motivo(*)' ) !!}
                                    {!! Form::select('motivo_id',$motivos
                                    , null , ['class' => 'form-control form-control-sm']) !!}
                                </div>--}}

                                <div class="form-group col-sm-12">
                                    {!! Form::label('detalle', 'Más Detalle' ) !!}
                                    {!! Form::textarea('detalle', null , ['class' =>
                                    'form-control
                                    form-control-sm']) !!}
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
                        onclick="sendFormIncidente('incidencia','POST','#test_');" id="btn_">
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