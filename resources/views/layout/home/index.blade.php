<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="/js/app/plugin/ckeditor/samples/css/samples.css">--}}
    {{--<link rel="stylesheet" href="/js/app/plugin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}
    <style>
        body{
            font:inherit IRANSans !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('/css/admin/base_css_admin/admin_base_css.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app/plugin/iCheck/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app/plugin/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app/plugin/select2/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/app/plugin/calendar/persianDatepicker-default.css')}}">


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



    @yield('styles')
    <style>
        .pagination{
            direction: ltr;
        }
        body.mini-navbar .nav-header {
            padding: 0;
            background-color:#3e2c42;
        }


        .skin-3 .navbar-minimalize {
            background: #18a689;
            border-color: #18a689;
        }

        .landing-page .navbar-default .nav li a {
            color: #fff;
            font-family: 'Open Sans', helvetica, arial, sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: black;
            font-size: 14px;
        }

    </style>

    <title>
        practice| @yield('title')
    </title>
</head>
<body id="page-top" class="landing-page no-skin-config" style="font-family: IRANSans">


<div id="page-wrapper" class="gray-bg" style="margin: 0 auto;">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">

                <div class="navbar-header page-scroll">

                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" href="#page-top">Home</a></li>
                        <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                        <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                        <li><a class="nav-link page-scroll" href="#testimonials">Testimonials</a></li>
                        <li><a class="nav-link page-scroll" href="#pricing">Pricing</a></li>
                        <li><a class="nav-link page-scroll" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <section id="features" class="container services">
        <div class="row">
            @yield('content')
        </div>
    </section>

</div>


<div id="loader"></div>

<script src="/js/app/base_js/base_admin_js.js"></script>
<script src="/js/app/plugin/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/app/plugin/validate/jquery.validate.min.js"></script>
<script src="/js/app/plugin/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/app/plugin/select2/select2.full.min.js"></script>

<script src="/js/app/main.js"></script>
<!-- iCheck -->
<script src="/js/app/plugin/iCheck/icheck.min.js"></script>
<script src="/js/app/plugin/toastr/toastr.min.js"></script>
<script src="/js/app/plugin/calendar/persianDatepicker.min.js"></script>
<script src="/js/app/plugin/jasny/jasny-bootstrap.min.js"></script>
<script src='/js/app/plugin/ckeditor/ckeditor.js'></script>
<script src="/js/app/plugin/ckeditor/samples/js/sample.js"></script>



<script>


    var spinner = $('#loader');


    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        toastr.options = {
            "closeButton": false,
            "progressBar": true
        };



        @if(session()->has('flash_message'))
        toastr.success("{{ @session('flash_message') }}");

        @endif
        @if(session()->has('flash_d_message'))
        toastr.warning("{{ @session('flash_d_message') }}");

        @endif

        @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.warning("{{ $error }}");
        @endforeach
        @endif
    });
</script>

@yield('scripts')

<script>
    checkValidate = function () {

        $("form").submit(function () {
            $("form").validate();
            // console.log($("#form").validate().invalid);
            // console.log(jQuery.isEmptyObject($("#form").validate().invalid));
            if(!jQuery.isEmptyObject($("form").validate().invalid)) {
                spinner.hide();
                return false;

            }

            $(this).find(':input[type=submit]').prop('disabled', true);
            $(this).find(':button[type=submit]').prop('disabled', true);

            spinner.show();
        });
    }

    var ajaxError = function (data) {
        if(data.status == 200) {
            sessionStorage.reloadAfterPageLoad = true;
            sessionStorage.setItem('warning', 'توکن شما به دلیل موارد امنیتی منقضی شده است. لطفا مجددا وارد سامانه شوید.');
            window.location.href='/logout';
        }

    };

    var ajaxCall = function (type, url, processData, data) {
        let output;
        let ajaxObject = {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: type,
            dataType: "json",
            data: data,
            cache: false,
            async: false,

            error: function(data) {
                ajaxError(data);
                output ={state:'error' ,data : data, status : data.status};
            }

        };

        if(processData == false ){
            ajaxObject.processData = false;
            ajaxObject.contentType = false;
        }


        $.ajax(ajaxObject).done(function(res) {
            output ={state:'done' ,data : res, status : 200};
        });

        return output;


    };

    var shortText = function (text) {
        if(text.length > 50) {
            return text.substr(0, text.lastIndexOf(' ', 50)) + '...';
        } else {
            return text;
        }

    };
</script>

</body>
</html>
