

<br><br>
<div class="card">


	<div class="card ">
		  <div class="card-body pb-0 pt-0">
			<a  style="font-size: 18px" href="{{url('/respaldo/manual')}}"   class="btn-sm  pull-right " title="Respaldo Manual BD"> 
				<span class="fa fa-download " aria-hidden="true"></span>  
				<!--<img style="width: 24px;" src="https://png.icons8.com/flat_round/50/000000/plus.png">-->
			 </a>

			
			
		</a>

			<ul style="list-style: none;" class="pull-left">
			   <li class="li_tam">
			    	Automatico 
			    </li>
			    		
			</ul>
			</div>
		</div>

<br>

	{!! Form::open(['route' => 'gremio.store'] ) !!}

	    <div class="card-body card-block">
		    @include('errors.erros')
						
			{!! Form::token() !!}

			<div class="form-group col-lg-6 p-0 ">
				{!! Form::label('fecha', 'Fecha del Respaldo' ) !!}
			    {!! Form::date('fecha', null , ['class' => 'form-control','placeholder' => '02/02/2018']) !!}
			</div>

			<div class="form-group col-lg-6 pl-2">
				{!! Form::label('ruta', 'Carpeta de Respaldo' ) !!}
			    {!! Form::text('ruta', null , ['class' => 'form-control','placeholder' => '/home/admin/Documentos/']) !!}
			</div>
	  
     		 @include('assets.btn_form_create')
	   </div>

   

	{!! Form::close() !!}
</div>





					
                        
                      
