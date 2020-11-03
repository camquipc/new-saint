<!DOCTYPE html>
<html>

<head>
    <title>newSait</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ubuntu.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <style>
        body {
            background-image: url('/img/fondo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            opacity 0.2;

        }

        #card-login {
            border-left: 4px solid #0069d9;
        }

        .error {
            color: red;
            font-style: italic;
            margin-top: 3px;
        }

        label.error {
            display: block;
            margin-bottom: 3px;
        }

        a:focus {
            width: 0px;
            height: 0px;
            outline: 0px;


        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 " style="margin-top: 150px;">
                @include('flash::message')
                <div class="card mb-3 p-3" style="max-width: 540px;" id="card-login">
                    <div class="row no-gutters">

                        <div class="col-md-6">
                            <img src="{{asset('img/login_saint.png')}}" class="card-img mt-4 p-2">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">

                                <form class="form-horizontal" id="formlogin" role="form" method="POST"
                                    action="{{ url('/login') }}" autocomplete="off">
                                    {{ csrf_field() }}
                                    <h5>Acceder al Sistema</h5>

                                    <div class="input-group mb-3 mt-3 input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-user " aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Usuario"
                                            aria-label="Username" aria-describedby="basic-addon1" name="usuario">
                                    </div>

                                    <div class="input-group mb-3 input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-key " aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password"
                                            aria-label="Username" aria-describedby="basic-addon1" name="password">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Ingresar</button>
                                </form>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <h5 class="text-center mt-3" style="font-size: 16px;">
                                <span class="badge pl-4 pr-4">
                                    &copy; copyright OTIC. <?php echo date('Y');?>
                                    &nbsp;&nbsp; <a style="cursor:pointer;text-decoration: underline;color:blue;"
                                        data-toggle="modal" data-target="#modalDevelopers"
                                        title="Contactar con los desarrolladores">
                                        <i class="fa fa-code"></i> Soporte Técnico</a>
                                </span>
                            </h5>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!--<div class="row">
            <div class="col-md-12">
                <h5 class="text-center mt-3" style="font-size: 16px;">
                    <span class="badge badge-dark pl-4 pr-4">
                        &copy; copyright OTIC. <?php echo date('Y');?>
                        &nbsp;&nbsp; <a style="cursor:pointer;" data-toggle="modal" data-target="#modalDevelopers"
                            title="Contactar con los desarrolladores">
                            <i class="fa fa-code"></i> Soporte Técnico</a>
                    </span>
                </h5>
            </div>

        </div>-->
    </div>


    <!-- Modal -->
    <div class="modal fade " id="modalDevelopers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">
                        <i class="fa fa-code"></i> Desarrolladores</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <ul class="list-unstyled">
                        @foreach($developers as $desarrollador)
                        <div class="card p-0 mb-2">
                            <li class="media" style="font-size: 10px;">
                                <img src="" class="mr-3">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-1" style="font-weight: bold;">
                                        {{ ucfirst($desarrollador->nombre )}} {{ ucfirst($desarrollador->apellido) }}
                                    </h6>
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
    </div>


    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <script>
        $('div.alert').not('.alert-important').delay(10000).fadeOut(350);
    </script>

</body>


</html>