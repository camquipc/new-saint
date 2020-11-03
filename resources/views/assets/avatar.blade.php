<ul class="navbar-nav my-lg-0">

  <li class="nav-item dropdown">
    <a style="font-size: 13px;" class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
      title="ÚLTIMA CONEXIÓN : 2020-03-02 06:30:12 - HOST : 190.200.43.17">
      <!--<img src="{{asset('img/logo-icon.png')}}" alt="user" class="profile-pic m-r-5" />-->
      {{ucfirst(Auth::user()->persona->p_nombre)}} {{ucfirst(Auth::user()->persona->p_apellido)}}
      <span style="font-size: 11px;">(@include('usuario.assets.usuarios_tipo', ['usuario' =>
        Auth::user()->tipo]))</span>
    </a>


    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ url('/salir') }}"
      title="Cerrar Sessión" onclick="return confirm('¿Realmente desea cerrar sesión?');">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
    </a>
  </li>
</ul>

<!--

<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="clockdate user">{{Auth::user()->persona->p_nombre}} {{Auth::user()->persona->p_apellido}} ({{Auth::user()->tipo}})</span>
    <img class="user-avatar rounded-circle" src="{{asset('images/admin.png')}}" alt="User Avatar" >      
  </a>

   <div class="user-menu dropdown-menu">
      <a class="nav-link" href="{{ url('/cuenta') }}" style="font-family: 'Ubuntu', sans-serif !important;"> 
        <i class="menu-icon fa fa-user"></i> Cuenta
      </a>
      <a class="nav-link" href="{{ url('/salir') }}" style="font-family: 'Ubuntu', sans-serif !important;">
        <i class="menu-icon fa fa-share-square-o"></i>  Salir
      </a>
   </div>-->