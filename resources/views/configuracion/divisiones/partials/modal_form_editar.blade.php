<!-- Modal -->
<div class="modal fade" id="divisionModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="divisionModalEditar">Actualizar Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="division/" id="form2" autocomplete="off">
          {{ method_field('PUT')}}
          {!! Form::token() !!}
          <div class="card">
            <fieldset>
              <legend style="width:140px;">
                Actualizar División
              </legend>
              <div class="card-body card-block p-2">
                <div class="row">


                  <div class="form-group col-lg-6 pl-2 ">
                    {!! Form::label('departamento', 'División' ) !!}
                    {!! Form::text('nombre', null , ['class' => 'form-control form-control-sm','placeholder' => 'Nombre
                    ' , 'required'
                    => 'true', 'id' => 'nombre2']) !!}
                  </div>

                  <div class="form-group col-lg-6 pl-2">
                    {!! Form::label('status', 'Status' ) !!}
                    {!! Form::select('status', ['' => 'Selecciona un Status' , 1 => 'Activo', 0 => 'Inactivo'] , null ,
                    ['class' =>
                    'form-control form-control-sm' , 'required' => 'true' , 'id' => 'status2']) !!}
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