<style>


body{

	font-family: 'Ubuntu', sans-serif;
}
	
table {     
	
    font-size: 8px; 
    width: 100%; 
    text-align: left;    
    border-collapse: collapse;
    text-transform: uppercase;
}

th {     
	font-size: 8px;    
	font-weight: normal;         
	background: #ddd;
    border: 1px solid #000;
    padding-left: 4px; 
}

td {    
	         
    color: #000;    
    border: 1px solid #000;
    padding-left: 4px;
}


</style>





<div style="width: 100%; margin: 0px;">


<!--encabezado -->

<h2>
	{{ $sistema->sistema}}
	<br>
	<span style="font-size: 12px;">{{ $sistema->caja}}</span>
	<br>
    <span style="font-size: 10px;">Registro {{ $sistema->registro}}</span>
</h2>



<p style="text-align: right; font-size: 12px;">Fecha: {{$fecha}}</p>
	

<br>
<br>



<table >
	<thead>

		<tr>
			<th colspan="6" style="font-size: 10px;">
				<center> <span class="uppercase"><<b>Historial de Usuario </b></span></center>
			</th>
		</tr>
		      <tr>
		      	<th width="10">#</th>
		        <th  style="text-align: left; width: 45px;" class="uppercase"><b>Usuario</b></th>
		        <th class="uppercase">Operación</th>
		        <th style="width: 45px;text-align: right;" class="uppercase"><b>Fecha</b></th>
		        <th style="width: 45px;text-align: right;" class="uppercase"><b>IP</b></th>
		        <th style="width: 55px;text-align: right;" class="uppercase" style="text-align: right;"><b>HostName</b></th>
		        
		      </tr>
		    </thead>
		    	<?php $i = 0;?>
		    <tbody>
		    	@if(isset($historials))	
			    	@foreach ($historials as $historial)
					  <tr>
					  	<td width="10" class="uppercase">{{ $i+1 }}</td>
				        <td style="text-align: left;width: 45px;" class="uppercase">{{ $historial->usuario}} </td>
				        <td class="uppercase">{{ $historial->operacion }}</td>
				         <td style="text-align: right;width: 45px;" class="uppercase">{{ $historial->fecha }}</td>
				        <td style="text-align: right;width: 45px;" class="uppercase">{{ $historial->ip }}</td>
				        <td  class="uppercase" style="text-align: right;width: 55px;">{{ $historial->so }}</td>
				      </tr>

				      <?php $i++;?>
			        @endforeach
		        @endif
		    </tbody>
</table>






<div style="position: fixed; bottom: 0px; font-size: 12px;">
	{{$sistema->sistema}}    <b>{{$fecha}}</b> 

	<span style="float: right;">Generado por:  
		<b>{{Auth::user()->persona->p_nombre}}  {{Auth::user()->persona->p_apellido}}</b>
	</span> 
</div>


</div>