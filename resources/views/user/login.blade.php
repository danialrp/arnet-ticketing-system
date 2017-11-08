<!DOCTYPE html>
<html class="no-js" dir="rtl" lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>سیستم پشتیبانی آرنت - ورود</title>

    <!-- STYLES -->

    <!-- IMPORT FOUNDATION CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('/css/foundation.min.css')}}"/>
    <!--IMPORT MAIN CSS-->
    <link type="text/css" rel="stylesheet" href="{{asset('/css/main.css')}}"/>
</head>

<body>

<div class="row expanded">
    <div id="login-box" class="large-3 columns large-centered">
        <form role="form" method="post" action="{{url('/login')}}">
            {!! csrf_field() !!}
            <fieldset class="fieldset">
                <legend class="small-fontsize-3">&nbsp;<span>ورود به سیستم پشتیبانی</span>&nbsp;</legend>

                <div class="row">
                    <div class="large-12 columns">
                        <input id="email-txt" name="email" type="text" placeholder="ایمیل" value="{{old('email')}}">
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <input name="password" type="password" placeholder="کلمه عبور">
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <button type="submit" name="action" class="button expanded">ورود</button>
                    </div>
                </div>

                @include('partial.loginError')

            </fieldset>
        </form>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/what-input.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/foundation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>

</body>
</html>
