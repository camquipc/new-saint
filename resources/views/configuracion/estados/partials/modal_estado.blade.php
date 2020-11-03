<!-- Modal -->
<div class="modal fade" id="modalNuevoEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Condición Incidente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'estado.store'] ) !!}
        <div class="card">
          <fieldset>
            <legend style="width:140px;">
              Nueva Condición
            </legend>
            <div class="card-body card-block p-2">
              <div class="row">
                @include('configuracion.estados.partials.form')
              </div>
            </div>
            <strong>(*) Campo Requerido</strong>
          </fieldset>
        </div>
      </div>

      <div class="modal-footer">
        <div class="btn-group col-md-12 mb-3" role="group" aria-label="Basic example"
          style="padding-left: 0px; margin-left: 0px;">
          <button type="submit" class="btn  btn-info btn-sm ">
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