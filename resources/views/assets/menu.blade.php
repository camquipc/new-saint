<nav class="sidebar-nav">
    <ul id="sidebarnav">
        @if(Auth::user()->tipo == '5')
        <li>
            <a href="{{url('/usuarios')}}" class="waves-effect"><i class="fa fa-users m-r-10"
                    aria-hidden="true"></i>Usuarios</a>
        </li>
        @else
        <li>
            <a href="{{url('home')}}" class="waves-effect"><i class="fa fa-home m-r-10"
                    aria-hidden="true"></i>Inicio</a>
        </li>
        <li>
            <a href="{{url('/incidencias')}}" class="waves-effect"><i class="fa fa-bug m-r-10"
                    aria-hidden="true"></i>Incidentes
            </a>


        </li>
        <li>
            <a href="{{url('/ayuda')}}" class="waves-effect"><i class="fa fa-life-saver m-r-10"
                    aria-hidden="true"></i>Ayuda</a>
        </li>

        @if(Auth::user()->tipo == '1' || Auth::user()->tipo == '2' )
        <li>
            <a href="{{url('/reportes')}}" class="waves-effect"><i class="fa fa-file-pdf-o m-r-10"
                    aria-hidden="true"></i>Reportes</a>
        </li>

        @endif
        @if(Auth::user()->tipo == '1')
        <li>
            <a href="{{url('/usuarios')}}" class="waves-effect"><i class="fa fa-users m-r-10"
                    aria-hidden="true"></i>Usuarios</a>
        </li>
        <li>
            <a href="{{url('/historial')}}" class="waves-effect">
                <i class="fa fa-map-signs m-r-10" aria-hidden="true"></i> Historial</a>

        </li>
        <li>
            <a href="{{url('configuracion/generales')}}" class="waves-effect"><i class="fa fa-cogs m-r-10"
                    aria-hidden="true"></i>Configuración</a>
        </li>
        @else
        <li>
            <a href="{{url('/cuenta')}}" class="waves-effect"><i class="fa fa-user m-r-10"
                    aria-hidden="true"></i>Perfil</a>
        </li>
        @endif
        @endif

    </ul>

</nav>