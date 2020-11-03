<div class="row">
    <div class="col-md-6">
        <ul style="list-style: none; padding:0px;">
            <li class="li_tam">
                Listado de Condiciónes
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <a style="font-size: 18px" href="#" data-toggle="modal" data-target="#modalNuevoEstado"
            class="btn-sm  pull-right " title="Nueva Condición">
            <span class="fa fa-plus-circle" aria-hidden="true"></span>
        </a>
    </div>
</div>

<table class="bootstrap-data-table table table-striped ">
    <thead>
        <tr>
            <th class="w10">#</th>
            <th>Condición</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estados as $estado)
        <tr>
            <td class="w10">{{ $estado->id }}</td>
            <td class="uppercase">{{ $estado->estado }}</td>
            <!--<td></td>-->
            <td width="10">
                <a class="btn btn-sm " title="Actualizar" data-toggle="modal" data-target="#modalEstadoEditar"
                    data-value="{{$estado->id}},{{$estado->estado}},0,0,4" onclick="getInputValueModalEstado(this)">
                    <i class="fa fa-edit"></i>
                </a>

            </td>
        </tr>

        @endforeach

    </tbody>
</table>


@include('configuracion.estados.partials.modal_estado')
@include('configuracion.estados.partials.modal_estado_editar')