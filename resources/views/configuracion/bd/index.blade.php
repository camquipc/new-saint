@extends('layouts.app_template')

@section('content')

<div class="col-lg-12">

<div class="card">
    <div class="card-header">
		<strong class="card-title">Configuración BD</strong>
    </div>

    <div class="card-body card-block">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
    <i class="fa fa-database"></i> Respaldo BD </a>
    
    
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact" aria-selected="false">
      <i class="fa fa-map-o"></i> Historial BD</a>
    
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		
    @include('configuracion.bd.partials.form')
  </div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  </div>

  
  
</div>

		
@include('layouts.app_template_sub_footer')
	
@endsection



