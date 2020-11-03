<!--botones de acceso directo-->
<div class="col-sm-3">
    <div class="card" style=" border-left: 4px solid #55ce63;">
        <div class="card-block p-0">
            <!-- incidentes Solucionados-->
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="font-weight-bold text-center mb-0 mt-1">Solucionados </p>
                </div>
                <div class="col-md-12 p-0">
                    <h1 class="text-center"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                        {{ $incidenteS}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-3">
    <div class="card" style=" border-left: 4px solid #ffbc34;">
        <div class="card-block p-0">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="font-weight-bold text-center mb-0 mt-1">Pendientes </p>
                </div>
                <div class="col-md-12 p-0">
                    <h1 class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        {{ $incidenteP}}
                    </h1>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="col-sm-3">
    <div class="card" style=" border-left: 4px solid #384d56;">
        <div class="card-block p-0">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="font-weight-bold text-center mb-0 mt-1">Asignados </p>
                </div>
                <div class="col-md-12 p-0">
                    <h1 class="text-center"><i class="fa fa-bug" aria-hidden="true"></i>
                        {{ $incidenteA}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-3">
    <div class="card" title="Productividad Mensual" style=" border-left: 4px solid #0069d9;">
        <div class="card-block p-0">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="font-weight-bold text-center mb-0 mt-1">Productividad</p>
                </div>
                <div class="col-md-12 p-0">
                    <h1 class="text-center"><i class="fa fa-line-chart" aria-hidden="true"></i>
                        {{ (($productividad  * 100) / 10) }} %
                        @if($productividad > 50 )
                        <i class="fa fa-angle-double-up" style="font-size:18px;color: #55ce63;"></i>
                        @else
                        <i class="fa fa-angle-double-down" style="font-size:18px;color:red;"></i>
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!--botones de acceso directo-->

<div class="col-sm-12 ">

    <div class="card">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
            </div>
        </div>
        <div class="card-block" id="realtime">

            <a style="font-size: 18px; cursor:pointer; color:#ffbc34;" href="" data-toggle="modal"
                data-target="#modalAyudaInmediata" class="btn-sm  pull-right " title="Ver Ayuda!">
                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
            </a>

            <h4 class="card-title">Incidentes Asignados</h4>

            <div class="table-responsive m-t-20">
                <table class="table stylish-table">
                    <thead>
                        <tr style="color:black;">
                            <th colspan="2">Nombre y Apellido</th>
                            <th>Motivo</th>
                            <th>Asignado</th>
                            <th colspan="1" class="text-center">Estado</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody id="body-table_soporte">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>