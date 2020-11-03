<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">

    <div class="navbar-header">
        @include('assets.logo')
    </div>

    <div class="navbar-collapse">

        <ul class="navbar-nav mr-auto mt-md-0 ">

            <li class="nav-item hidden-sm-down mr-2 ml-5">
                <a class="badge badge-dark" id="observacion"
                    style="visibility: hidden;opacity: 0;transition: visibility 0s, opacity 0.5s linear;"
                    onclick="getModalObservaciones();">

                </a>
            </li>

            <li class="nav-item hidden-sm-down mr-2 ">
                <a class="badge badge-dark" id="notificacion" style="display:hidden;"
                    onclick="getModalNotificaciones();">

                </a>
            </li>

        </ul>

        <p>
            <span id="clock"></span>
        </p>

        @include('assets.avatar')
    </div>
</nav>

<!--fa fa-bell-->