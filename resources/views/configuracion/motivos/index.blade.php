<div class="row">
    <div class="col-md-6">
        <ul style="list-style: none; padding:0px;">
            <li class="li_tam">
                Listado de Motivos
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <a style="font-size: 18px" href="#" data-toggle="modal" data-target="#modalNuevoMotivo"
            class="btn-sm  pull-right " title="Nuevo Motivo">
            <span class="fa fa-plus-circle" aria-hidden="true"></span>
        </a>
    </div>
</div>

<table class="bootstrap-data-table table table-striped ">
    <thead>
        <tr>
            <th width="10">#</th>
            <th style="text-align: left; width:70%;" colspan="2">Motivo</th>
            <th></th>
            <th>División</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($motivos as $motivo)
        <tr>
            <td>{{ $motivo->id }}</td>
            <td style="text-align: left; width:70%;" colspan="2" class="uppercase">{{ $motivo->nombre }}</td>
            <td></td>
            <td class="uppercase">{{ $motivo->categoria->nombre }}</td>

            <td width="10">
                <a class="btn btn-sm " title="Actualizar" data-toggle="modal" data-target="#modalMotivoEditar"
                    data-value="{{$motivo->id}},{{$motivo->nombre}},{{$motivo->categoria_id}},0,3"
                    onclick="getInputValueModal(this)">
                    <i class="fa fa-edit"></i>
                </a>

            </td>
        </tr>

        @endforeach

    </tbody>
</table>


@include('configuracion.motivos.partials.modal_motivo_create')

@include('configuracion.motivos.partials.modal_motivo_update')