<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->

    <title>SAIT </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/blue.css')}}" id="theme" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ubuntu.css')}}">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">

</head>

<body class="fix-header fix-sidebar card-no-border" id="boo">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!--<div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>-->

    <input type="hidden" value="{{Auth::user()->id}}" id="user_login_id">
    <input type="hidden" value="{{Auth::user()->tipo}}" id="user_login_tipo">
    <input type="hidden" value="<?php echo $_SERVER['HTTP_HOST'];?>" id="hostname">
    <input type="hidden" value="<?php echo $_SERVER['SERVER_PORT'];?>" id="port">

    <div id="main-wrapper">

        <header class="topbar">
            @include('assets.header')
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">

                @include('assets.menu')
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        <div class="page-wrapper" style=" background: transparent;">

            <div class="container-fluid" style="position:relative;">
                <div class="row">
                    @include('assets.alerta')
                    @yield('content')
                </div>
            </div>

            @include('assets.footer')
        </div>

    </div>


    @yield('content-script')


    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/moment-with-locales.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>

    <!--stickey kit -->
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/additional-methods.min.js')}}"></script>
    <script src="{{asset('js/v1.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>