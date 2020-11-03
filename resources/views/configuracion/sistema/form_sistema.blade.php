{!! Form::model( $sistema, ['url' => 'configuracion/sistema','files' => true] ) !!}

<fieldset>
	<legend>
		<!--<strong class="card-title "-->
		Información del Sistema
		<!--</strong>-->
	</legend>

	<div class="card-body card-block p-2">

		<div class="row">
			<div class="form-group col-md-4">
				{!! Form::label('telf', 'Nombre Sistema (*)' ) !!}
				{!! Form::text('sistema_nombre', $sistema->sistema_nombre, ['class' => 'form-control form-control-sm'])
				!!}
			</div>

			<input type="hidden" name="id" value="{{$sistema->id}}">
			<div class="form-group col-md-6">

				{!! Form::label('fecha_egreso', 'Detalle del Sistema' ) !!}
				{!! Form::text('sistema_detalle', $sistema->sistema_detalle, ['class' => 'form-control
				form-control-sm'])
				!!}
			</div>

			<div class="upload-btn-wrapper form-group col-md-2">
				{!! Form::label('logo', 'Logo Sistema' ) !!}
				<div class="btn-file2" style="cursor: pointer; width: 110px;height: 120px;">

					@if($sistema->logo == null)
					<i class="menu-icon fa fa-desktop" style="font-size: 1em;"></i>
					@else

					<img src="{{asset($sistema->logo)}}" alt="logo" style="max-width:100%;">
					@endif

				</div>

				<input type="file" name="foto" style="line-height: 3; cursor: pointer;" value="{{$sistema->logo}}">

			</div>
		</div>



	</div>
</fieldset><br>
@include('assets.btn_form_update')

{!! Form::close() !!}