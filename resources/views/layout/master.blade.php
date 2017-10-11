<html class="no-js" dir="rtl" lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Page Title-->
    <title>Arnet - @yield('title')</title>

    <!--STYLES-->
    <!--IMPORT FOUNDATION CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/foundation.min.css') }}"/>
    <!--IMPORT FONT-AWESOME ICONS-->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <!--IMPORT MAIN CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <!--IMPORT TRUMBOWYG-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/trumbowyg.min.css') }}"/>

</head>

<body>

@include('partial.header')

@include('partial.sidebar')

<div class="row expanded">
    <div class="large-12 columns">
        @include('partial.flash')
    </div>
</div>

@yield('content')

@include('partial.footer')

</body>

</html>