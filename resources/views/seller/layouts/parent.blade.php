<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/summernote/summernote-bs4.min.css')}}">

    <!-- main css -->
    <link rel="stylesheet" href="{{asset('custom-css/seller.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    @stack('links')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

        @yield('preloader')

        @yield('header')

        @section('content')
            @show


        @yield('footer')

    <!-- jQuery -->
    <script src="{{ asset('dashboard-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('dashboard-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('dashboard-assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('dashboard-assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('dashboard-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('dashboard-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('dashboard-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('dashboard-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('dashboard-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('dashboard-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard-assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard-assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dashboard-assets/dist/js/pages/dashboard.js') }}"></script>

    @stack('scripts')

</body>

</html>
