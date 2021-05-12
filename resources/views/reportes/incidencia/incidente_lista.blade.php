
@extends('reportes.plantilla')
@section('content')

<style>
	body {font-family: 'Ubuntu', sans-serif;}	
	table {font-size:8px;width:100%;text-align: left;border-collapse: collapse;text-transform: uppercase;}
	th {font-size: 8px;font-weight: normal;background: #ddd;border: 1px solid #000;padding-left: 4px;}
	td {color: #000;border: 1px solid #000;padding-left: 4px;}
</style>

<div style="width: 100%; margin: 0px;">
<table >
	<thead>
		<tr>
			<th colspan="6" style="font-size: 10px;">
				<center> <span class="uppercase"><<b>Incidentes por rango de fecha </b></span></center>
			</th>
		</tr>
		      <tr>
		      	<th width="10">#</th>
		        <th  style="text-align: left; width: 45px;" class="uppercase"><b>Incidente</b></th>
		        <th class="uppercase">Motivo</th>
                <th style="width: 70px;" class="uppercase"><b>Departamento</b></th>
		        <th style="width: 90px;" class="uppercase"><b>Dirigido</b></th>
		        <th style="width: 55px;" class="uppercase" style="text-align: right;"><b>Fecha</b></th>
		      </tr>
		    </thead>
		    	<?php $i = 0;?>
		    <tbody>
		    	@if(isset($incidencias))	
			    	@foreach ($incidencias as $incidencia)
					  <tr>
					  	<td width="10" class="uppercase">{{ $i+1 }}</td>
				        <td style="text-align: left;width: 45px;" class="uppercase">{{$incidencia->codigo}} </td>
				        <td class="uppercase">{{$incidencia->motivo->nombre}}</td>
				         <td style="width: 70px;" class="uppercase">{{ucfirst($incidencia->user->departamento->nombre)}}</td>
				        <td style="width: 90px;" class="uppercase">{{$incidencia->motivo->categoria->nombre}}</td>
				        <td  class="uppercase" style="width: 55px;">{!! \Carbon\Carbon::parse($incidencia->fecha)->format("d-m-Y") !!}</td>
				      </tr>
				      <?php $i++;?>
			        @endforeach
		        @endif
		    </tbody>
</table>
</div>
@endsection