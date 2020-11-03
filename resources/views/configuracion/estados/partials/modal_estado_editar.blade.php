<!-- Modal -->
<div class="modal fade" id="modalEstadoEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="divisionModalEditar">Actualizar Condición</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="estado/" id="form4" autocomplete="off">
          {{ method_field('PUT')}}
          {!! Form::token() !!}
          <div class="card">
            <fieldset>
              <legend>
                Actualizar Condición
              </legend>
              <div class="card-body card-block p-2">
                <div class="row">
                  <div class="form-group col-lg-6 pl-2 ">
                    {!! Form::label('departamento', 'Condición' ) !!}
                    {!! Form::text('estado', null , ['class' => 'form-control form-control-sm','placeholder' => 'Nombre
                    ' , 'required'
                    => 'true', 'id' => 'nombre4']) !!}
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
          <button type="submit" class="btn  btn-info btn-sm ">
            <span class="fa fa-refresh" aria-hidden="true"></span> Actualizar
          </button>

          <!--<button type="reset" class="btn  btn-default btn-sm">
            <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
          </button>-->

          <button class="btn  btn-danger btn-sm " data-dismiss="modal">
            <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
          </button>

        </div>
      </div>
    </div>
    </form>
  </div>
</div>