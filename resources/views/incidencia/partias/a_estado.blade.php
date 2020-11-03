@if($estado == 3)
<!--<div style="padding:8px;background: #ffbc34;width:10px; margin:0 auto; cursor:pointer;" class="mt-1"
    title="En espera..."></div>-->
<i class="fa fa-clock-o" style="color: #ffbc34; cursor:pointer; text-align: center;" title="En espera..."></i>
<!--<span style="color: #ffbc34; cursor:pointer; text-align: center;" title="En espera...">En espera...</span>-->
@endif

@if($estado == 2)
<!--<div style="padding:8px;background: #55ce63;width:10px; margin:0 auto; cursor:pointer; text-aline: center;" class="mt-1"
    title="Solucionado"></div>-->
<i class="fa fa-check-circle" style="color: #55ce63; cursor:pointer; text-align: center;" title="Solucionado"></i>
<!--<span style="color: #55ce63; cursor:pointer; text-align: center;" title="Solucionado">Solucionado</span>-->
@endif

@if($estado == 1)
<!--<div style="padding:8px;background: #7b7d7f;width:10px; margin:0 auto; cursor:pointer; text-aline: center;" class="mt-1"
    title="Atendida (sin solución)">
</div>-->
<i class="fa fa-check-circle" style="color:red; cursor:pointer; text-align: center;"
    title="Atendida (Sin solución)"></i>
<!--<span>Atendida</span>-->
@endif