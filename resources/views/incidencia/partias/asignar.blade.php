<!-- Modal -->
<div class="modal fade modal-close" id="modalAsignarTecnico" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Módulo Incidentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'incidencia/asignar', 'autocomplete'=>'off' , 'id' => 'form_a'] ) !!}



                <input type="hidden" name="incidencia_id" id="incidente_">

                <div class="card">
                    <fieldset>
                        <legend style="width:140px;">
                            Asignar incidente
                        </legend>
                        <div class="card-body card-block p-2">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('dirigido', 'Asignar a (*)' ) !!}

                                    <select name="asignado" class="form-control form-control-sm" id="select_"
                                        onclick="validSelectRequired('select_', 'btn_asignar');">
                                        <option value="">Seleciona un Técnico</option>
                                        @foreach ($users as $user)

                                        @if($user->categoria->nombre !== 'Ninguno')

                                        @if($user->tipo == 1)
                                        <option value="{{$user->id}}">
                                            {{ ucfirst($user->persona->p_nombre)}}
                                            {{ ucfirst($user->persona->p_apellido)}}
                                            (Admin)
                                        </option>
                                        @else
                                        <option value="{{$user->id}}">{{ ucfirst($user->persona->p_nombre)}}
                                            {{ucfirst($user->persona->p_apellido)}}
                                            ({{ucfirst($user->categoria->nombre)}})
                                        </option>
                                        @endif

                                        @endif

                                        @endforeach
                                    </select>
                                    <span id="selet_msj"></span>
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
                    <button type="button" class="btn  btn-info btn-sm " id="btn_asignar" disabled="true"
                        onclick="sendFormIncidente('incidencia/asignar','POST','#form_a');">
                        <span class="fa fa-check" aria-hidden="true"></span> Asignar
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