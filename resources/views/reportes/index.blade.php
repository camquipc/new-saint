@extends('layouts.app')

@section('content')

@if(Auth::user()->tipo == '2')
@include('reportes.soporteTecnicoPdf')
@endif

@if(Auth::user()->tipo == '1')
@include('reportes.indexPdf')
@endif

@if(Auth::user()->tipo == '4' )
@endif


@endsection