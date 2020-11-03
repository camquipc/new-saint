@if($errors->any())

<div class="alert alert-danger" role="alert">

	<h5>Por favor corrige los errores:</h5>

	<ul>
		@foreach($errors->all() as $error)
		<li>
			<h6>{{ $error}}</h6>
		</li>
		@endforeach
	</ul>
</div>

@endif