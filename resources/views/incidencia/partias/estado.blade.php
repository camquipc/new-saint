<!-- Modal -->
<div class="modal fade" id="modalEstadoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Módulo Incidentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'incidencia/update/estado/', 'autocomplete'=>'off', 'id' => 'form_a'] ) !!}

                {!! Form::token() !!}

                <input type="hidden" name="incidencia_id" id="estadoUpdate_">

                <div class="card">
                    <fieldset>
                        <legend style="width:140px;">
                            Actualizar Estado
                        </legend>
                        <div class="card-body card-block p-2">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('dirigido', 'Nuevo Estado (*)' ) !!}

                                    <select name="estado_id" class="form-control form-control-sm">
                                        <option value="{{$incidencia->estado->id}}">Seleciona un Estado</option>
                                        @foreach ($estados as $estado)
                                        @if($estado->id != $incidencia->estado->id)
                                        <option value="{{$estado->id}}">{{ $estado->estado}} </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12">
                                    {!! Form::label('detalle', 'Nota Técnica' ) !!}
                                    {!! Form::textarea('nota', null , ['class' =>
                                    'form-control
                                    form-control-sm', 'lang'=>'es']) !!}
                                </div>
                                <div class="col">
                                    <strong>(*) Campo Requerido</strong>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>


            </div>

            <div class="modal-footer">
                <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
                    style="padding-left: 0px; margin-left: 0px;">
                    <button type="submit" class="btn  btn-info btn-sm ">
                        <span class="fa fa-edit" aria-hidden="true"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>