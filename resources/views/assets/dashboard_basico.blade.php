<div class="col-sm-12">
    <div class="card">
        <div class="card-block">

            <a style="font-size: 18px; cursor:pointer; color:#ffbc34;" href="" data-toggle="modal"
                data-target=".bd-example-modal-sm" class="btn-sm  pull-right " title="Ver Ayuda!">
                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
            </a>

            <a style="font-size: 18px;cursor:pointer;" href="" data-toggle="modal"
                data-target="#modalCreateIncidenteTercero" class="btn-sm  pull-right warning" title="Nuevo Incidente">
                <span class="fa fa-plus-circle" aria-hidden="true"></span>
            </a>


            <h4 class="card-title">Incidentes Reportados</h4>

            <br>

            <div class="table-responsive m-t-20">
                <table class="table stylish-table">
                    <thead>
                        <tr>
                            <th colspan="2">Dirigido a</th>
                            <th colspan="1" class="text-center">Incidente</th>
                            <th colspan="1">Motivo</th>
                            <th colspan="1">Fecha</th>
                            <th colspan="1" class="text-center"><i class="fa fa-ellipsis-h"></i> </th>
                        </tr>
                    </thead>
                    <tbody id="body-table"></tbody>
                </table>
            </div>
            <!--esta es el formulario para asignar técnico a la incidencia-->
            @include('incidencia.partias.asignar')
        </div>
    </div>
</div>



<!--      @foreach ($incidencias as $incidencia)
            @if (!$incidencia->asignada)
            <tr>
                <td style="width:30px;">
                    <span class="round">
                        {{ $incidencia->motivo->categoria->nombre[0]}}
                    </span>
                </td>
                <td>
                    <h6>{{$incidencia->motivo->categoria->nombre}}</h6>
                    <small class="text-muted">
                        {!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}
                    </small>
                </td>
                <td>{{$incidencia->motivo->nombre}}</td>

                <td>
                    @if(Auth::user()->tipo == 4 || Auth::user()->tipo == 4)
                    @if(!$incidencia->asignada)
                    <a style="font-size: 16px; cursor: pointer;" data-toggle="modal" data-target="#modalAsignarTecnico"
                        class="btn-sm  pull-right " title="Asignar Técnico" data-value="{{$incidencia->id}},incidente_"
                        onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-wrench" aria-hidden="true"></span>
                    </a>
                    @endif
                    @endif
                </td>
            </tr>
            @endif
            @endforeach -->