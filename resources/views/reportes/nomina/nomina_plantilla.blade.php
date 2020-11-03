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

<ul style="list-style: none; padding-left: 0px; font-size: 12px; text-transform: uppercase;" >
	<li >
		Nómina Código: {{ $nomina->codigo }}
	</li>
	<li >   
		Periodo: {{ $nomina->fecha }}
	</li>
	<li >   
		Nómina Tipo: {{ $nomina->tipoNomina->tipo_nomina }}
	</li>
</ul>

<br>



<table >
	<thead>
		<tr>
			<th >#</th>
			<th >CÉDULA</th>
			<th >NOMBRE Y APELLIDO </th>
			<th style="text-align: right;">EMPLEADO</th>
			<th style="text-align: right;">PATRÓN</th>
			<th style="text-align: right;">TOTAL</th>		
		</tr>		
	</thead>
	<tbody>

					<?php $num = 1; $total = 0; ?>

					@foreach($nomina->pago_nominas as $nom)					
						<tr>

							<td>{{$num}}</td>
							<td>{{$nom->socio->persona->ci}}</td>
						
							<td>{{$nom->socio->persona->p_nombre}}  {{$nom->socio->persona->p_apellido}}</td>

							<td style="text-align: right;">{{number_format($nom->empleado, 2, ',', '.')}}</td>
						
							<td style="text-align: right;">{{number_format($nom->patron, 2, ',', '.')}}</td>

							<td style="text-align: right;" >{{ number_format($nom->total, 2, ',', '.')}}</td>

							
						
						</tr>
					<?php $num++; $total+=$nom->total;?>
					
					@endforeach
				</tbody>
				   <tr >
				   	<th colspan="5" style="text-align: right; padding-right: 4px;">
				   		TOTAL NOMINA 
				   	</th>
					<td style="text-align: right;">
						<?php echo ' ' . number_format($total, 2, ',', '.'); ?>
					</td>
				   </tr>
			</table>

<br>




<div style="position: fixed; bottom: 0px; font-size: 12px;">
	{{$sistema->sistema}}    <b>{{$fecha}}</b> 

	<span style="float: right;">Generado por:  
		<b>{{Auth::user()->persona->p_nombre}}  {{Auth::user()->persona->p_apellido}}</b>
	</span> 
</div>


</div>