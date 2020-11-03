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
	<tr colspan="6">
		<th ><center>Listado de Nóminas </center></th>
	</tr>
</table>
<table >
	<thead>
		      <tr>
		      	<th style="width: 10px;">#</th>
		      	<th style="width: 30px;">{{ ucwords('CODIGO')}}</th>
		      	<th style="width: 60px;">{{ ucwords('tipo de nómina')}}</th>
		        <th style="width: 30px;">{{ ucwords('fecha')}}</th>
		        <th style="width: 30px; text-align: right;">{{ ucwords('monto total')}}</th>
		      </tr>
		    </thead>
		    <tbody>

		    	<?php $num = 1;?>
		    	@foreach ($nominas as $nomina)
    
				  <tr>
				  	<td >{{ $num }}</td>
				  	<td >{{ $nomina->codigo }}</td>
			        <td >{{ $nomina->tipoNomina->tipo_nomina}}</td>
			        <td >{{ $nomina->fecha }}</td>
			        <td style="width: 30px; text-align: right;">{{ montoTotal($nomina->id) }}</td>
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