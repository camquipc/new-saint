<style>


body{

	font-family: 'Ubuntu', sans-serif;
}
	
table {     
	
    font-size: 10px; 
    width: 100%; 
    text-align: left;    
    border-collapse: collapse;
    text-transform: uppercase;
}

th {     
	font-size: 10px;    
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

.badge-success{

	background: green;
	color: #fff;
}

.badge-warning{

	background: tomato;
	color: #000;
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


<table  >
	<tr colspan="8">
		<th ><center>socios de la caja de ahorro</center></th>
	</tr>
</table>
<table >
	<thead>
		      <tr>
		      	<th width="10">#</th>
		      	<th width="20">{{ ucwords('CODIGO')}}</th>
		      	<th width="20">{{ ucwords('CÉDULA')}}</th>
		        <th>{{ ucwords('SOCIO')}}</th>
		        <th>{{ ucwords('GREMIO')}}</th>
		        <th>{{ ucwords('CONDICIÓN')}}</th>
		        <th >{{ ucwords('STATUS')}}</th>
		       
		      </tr>
		    </thead>
		    <tbody>

		    	<?php $num = 1;?>
		    	@foreach ($socios as $socio)
    
				  <tr>
				  	<td >{{ $num }}</td>
				  	<td >{{ $socio->codigo }}</td>
			        <td >{{ $socio->persona->ci }}</td>
			        <td >{{ $socio->persona->p_nombre }}  {{ $socio->persona->p_apellido }}</td>
			        <td >{{ $socio->gremio->nombre }}</td>
			        <td >{{ $socio->condicion->nombre }}</td>
			        <td  >

						@if ($socio->status == 1)
						   <span class="badge-success">Activo</span>
						
						@else
						    <span class="badge badge-warning">Suspendido</span>
						@endif
			        </td>
			        
			      </tr>
				<?php $num++; ?>
		        @endforeach
		      
		    </tbody>
</table>






<div style="position: fixed; bottom: 0px; font-size: 12px;">
	{{$sistema->sistema}}    <b>{{$fecha}}</b> 

	<span style="float: right;">Generado por:  
		<b>{{Auth::user()->persona->p_nombre}}  {{Auth::user()->persona->p_apellido}}</b>
	</span> 
</div>


</div>