<div class="col-sm-12">

    <div class="card">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
            </div>
        </div>
        <div class="card-block">

            <a style="font-size: 18px; cursor:pointer; color:#ffbc34;" href="" data-toggle="modal"
                data-target="#modalAyudaInmediata" class="btn-sm  pull-right " title="Ver Ayuda!">
                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
            </a>

            <a style="font-size: 18px;cursor:pointer;" data-toggle="modal" data-target="#modalCreateIncidente"
                class="btn-sm  pull-right " title="Nuevo Incidente">
                <span class="fa fa-plus-circle" aria-hidden="true"></span>
            </a>

            <h4 class="card-title">Estado de Incidentes </h4>
            <br>
            <div class="table-responsive m-t-20">
                <table class="table stylish-table">
                    <thead>
                        <tr style="color:black;">
                            <th colspan="2">Dirigido a</th>
                            <th>Motivo</th>
                            <th colspan="1" class="text-center"> Estado</th>
                            <th colspan="1" class="text-center">Condición</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body-table-usuario">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>