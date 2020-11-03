<!-- Modal -->
<div class="modal fade" id="exampleModalLabelEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unidades Administrativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="departamento/" id="form1" autocomplete="off">
          {{ method_field('PUT')}}
          <div class="card">
            <fieldset>
              <legend style="width:140px;">
                Actualizar Unidad
              </legend>
              <div class="card-body card-block p-2">
                <div class="row">

                  {!! Form::token() !!}

                  <div class="form-group col-sm-6 pl-2 ">
                    {!! Form::label('nombre', 'Nombre Unidad' ) !!}


                    <input type="text" id="nombre1" name="nombre" class="form-control form-control-sm" value="">
                  </div>

                  <div class="form-group col-sm-6 pl-2">
                    {!! Form::label('status', 'Status' ) !!}
                    {!! Form::select('status', ['' => 'Seleccionar' , 1 => 'Activo', 0 => 'Inactivo'] , null , ['class'
                    =>
                    'form-control form-control-sm' , 'required' => 'true' , 'id' => 'status1']) !!}
                  </div>

                  <!--<div class="form-group col-sm-6 pl-2 ">
                    {!! Form::label('departamento', 'Usuarios Permitidos' ) !!}
                    {!! Form::number('num_usuario_permitido', 5 , ['class' => 'form-control
                    form-control-sm','placeholder' => '1' ,
                    'required' =>
                    'true' , 'id' => 'num_usuario_permitido1'])
                    !!}
                  </div>-->
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
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!--
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabelEditar">Actualizar Departamento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">



    <form method="POST" action="departamento/" id="form1">

      {!! Form::token() !!}

      {{ method_field('PUT')}}

      <input type="hidden" value="" id="id1">

      <div class="form-group col-lg-6 p-0 ">
        {!! Form::label('departamento', 'Departamento' ) !!}

        <input type="text" name="nombre" value="" class="form-control" id="nombre1" required="true">
      </div>

      <div class="form-group col-lg-6 pl-2">
        {!! Form::label('status', 'Status' ) !!}

        <select name="status" class="form-control" id="status1" required="true">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
  </div>
  <div class="modal-footer">
    <div class="btn-group col-md-12 mb-3 " role="group" aria-label="Basic example">
      <button type="submit" class="btn btn-primary btn-sm">
        <span class="fa fa-refresh" aria-hidden="true"></span> Actualizar
      </button>

      <a href="{{url('/submodulo')}}" class="btn btn-danger btn-sm">
        <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
      </a>
    </div>
  </div>


</div>
</form>-->