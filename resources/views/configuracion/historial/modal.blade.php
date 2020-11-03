<!-- Modal -->
<div class="modal fade" id="exampleModa30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial Usuarios </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formH" method="POST" action="{{route('get_historial')}}">
          {{ csrf_field() }}
          <div class="card">
            <fieldset>
              <legend style="width:140px;">
                Filtrar Historial
              </legend>
              <div class="card-body card-block pl-2">
                <div class="row">

                  <div class="form-group col-md-2 form-group-sm">
                    <label for="customCheck">Hoy</label> <br>
                    <input type="checkbox" id="customCheck" name="hoy" value="1">
                  </div>

                  <div class="form-group col-md-5 form-group-sm">
                    {!! Form::label('fecha_egreso', 'Desde' ) !!}
                    {!! Form::date('desde', null , ['class' => 'form-control form-control-sm','id' => 'desde']) !!}
                  </div>

                  <div class="form-group col-md-5 form-group-sm">
                    {!! Form::label('fecha_egreso', 'Hasta' ) !!}
                    {!! Form::date('hasta',null, ['class' => 'form-control form-control-sm' ,'id' => 'hasta']) !!}
                  </div>

                  <div class="form-group col-md-12 form-group-sm">
                    {!! Form::label('tipo', 'Usuario' ) !!}

                    <select name="usuario" id="" class="form-control form-control-sm">
                      <option value="">Nombre de Usuario</option>
                      <option value="todos">Todos los usuarios</option>
                      @foreach ($users as $user)
                      <option value="{{$user->usuario}}">{{$user->usuario}} ({{$user->tipo}})</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- <strong>(*) Campo Requerido</strong>-->
            </fieldset>
          </div>
      </div>

      <div class="modal-footer">
        <div class="btn-group col-md-12 mb-3 p-0" style="margin-left: 0px;" role="group" aria-label="Basic example">
          <button type="submit" class="btn btn-primary  btn-sm">
            <span class="fa fa-search-plus" aria-hidden="true"></span> Buscar
          </button>

          <button type="reset" class="btn btn-default btn-sm">
            <span class="fa fa-trash" aria-hidden="true"></span> Limpiar
          </button>

          <a href="" data-dismiss="modal" class="btn btn-danger btn-sm">
            <span class="fa fa-times-circle" aria-hidden="true"></span> Cancelar
          </a>

        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>