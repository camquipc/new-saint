@extends('layouts.app')

@section('content')

@if(Auth::user()->tipo == '3')
@include('assets.dashboard_usuario')


@include('incidencia.partias.observacion')
@include('incidencia.partias.create')
@endif



@if(Auth::user()->tipo == '2')
@include('assets.dashboard_soporte')
@include('incidencia.partias.observacion')
@include('incidencia.partias.create')
@endif

@if(Auth::user()->tipo == '1')
<!--@include('assets.dashboard_admin')-->
@include('incidencia.partias.create')
@include('incidencia.partias.createAterceros')
@endif

@if(Auth::user()->tipo == '4' )

@include('assets.dashboard_basico')

@include('assets.modal_ayuda')

@include('incidencia.partias.createAterceros')

@endif

@if(Auth::user()->tipo == '5')

@endif


@endsection