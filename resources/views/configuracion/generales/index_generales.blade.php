<fieldset>
    <legend>
        <!--<strong class="card-title "-->
        Directiva OTIC
        <!--</strong>-->
    </legend>

    <div class="card-body card-block p-2">
        <div class="row mt-2">
            <div class="form-group col-md-6">
                <div class="input-group  ">
                    <input type="text" class="form-control form-control-sm" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="button-addon2"
                        value="{{$directivo[0]->nombre}} {{$directivo[0]->apellido}}" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-info btn-sm" type="button" id="button-addon2" title="Actualizar datos"
                            style="margin-left:-2px;" data-toggle="modal" data-target="#modalNuevoDirector">
                            <i class="fa fa-refresh" aria-hidden="true" style="font-size:16px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

@include('configuracion.generales.partials.modal_director')