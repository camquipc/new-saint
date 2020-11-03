@extends('layouts.app')

@section('content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Desarrolladores</strong>
    </div>
    <div class="card-body card-block">
      <ul class="list-unstyled">

        @foreach($desarrolladores as $desarrollador)

        <div class="card">
          <li class="media">
            <img src="" class="mr-3">
            <div class="media-body">
              <h6 class="mt-0 mb-1">{{ $desarrollador->nombre }} {{ $desarrollador->apellido }}</h6>
              <h6 class="mt-0 mb-1">{{ $desarrollador->grado_i }}</h6>
              <a href="{{ $desarrollador->email }}">
                <h6 class="mt-0 mb-1">{{ $desarrollador->email }}</h6>
              </a>
              <h6 class="mt-0 mb-1">{{ $desarrollador->rool }}</h6>
            </div>
          </li>

        </div>
        @endforeach

      </ul>
    </div>
  </div>
</div>

@endsection