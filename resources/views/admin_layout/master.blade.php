<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Page Title-->
    <title> Arnet@admin @yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('/back/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/back/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/back/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/back/css/AdminLTE.min.css') }}">
    <!-- Admin Skins -->
    <link rel="stylesheet" href="{{ asset('/back/css/skin-blue.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('/back/css/main.css') }}">
    
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin_partial.header')

    @include('admin_partial.sidebar')

    @yield('content')

    @include('admin_partial.control_sidebar')

    @include('admin_partial.footer')

</div>
<!-- ./wrapper -->


<!-- JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('back/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('back/js/bootstrap.min.js') }}"></script>
<!-- Admin App -->
<script src="{{ asset('back/js/adminlte.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('back/js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('back/js/fastclick.js') }}"></script>
<!-- Costume Script -->
<script src="{{ asset('back/js/script.js') }}"></script>

</body>

</html>