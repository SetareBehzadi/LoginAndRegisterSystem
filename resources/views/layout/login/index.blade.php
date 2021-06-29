<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--___________________ faveicon__________________________--}}


    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/faveicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{--___________________ faveicon__________________________--}}



    <link rel="stylesheet" href="/css/admin/base_css_admin/admin_base_css.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/app/plugin/iCheck/custom.css">
    <link rel="stylesheet" href="/css/app/plugin/toastr/toastr.min.css">
    <link rel="stylesheet" href="/css/app/plugin/select2/select2.min.css">

    @yield('styles')

    <title>
         @yield('title')
    </title>
</head>

<body class="rtls">

          @yield("content")

<script src="/js/app/base_js/base_admin_js.js"></script>
<script src="/js/app/plugin/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/app/plugin/validate/jquery.validate.min.js"></script>
<script src="/js/app/plugin/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/app/main.js"></script>
<!-- iCheck -->
<script src="/js/app/plugin/iCheck/icheck.min.js"></script>
<script src="/js/app/plugin/toastr/toastr.min.js"></script>

<script>
    $(document).ready(function(){

        $(document).ready(function() {
            // $('form:first *:input[type!=hidden]:first').focus();
        });


        @if(session()->has('flash_message_error'))
        toastr.success("{{ @session('flash_message_error') }}");

        @endif
        @if(session()->has('flash_d_message'))
        toastr.warning("{{ @session('flash_d_message') }}");

        @endif

    });
</script>

@yield('scripts')

</body>
</html>
