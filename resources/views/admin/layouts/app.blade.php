<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('fileofdesgin_dashbord/images/favicon.ico') }}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fileofdesgin_dashbord/css/style.css') }}" />
    <style>
        .wrapper {
            background: #418c5285 url('{{ asset('fileofdesgin_dashbord/images/bg.jpg') }}') no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-blend-mode: multiply;
            height: 100vh;

        }
        *{
            font-size: 16px
        }

    </style>
    @stack('css')
</head>

<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>
        @yield('content')
    </div>
    <!-- jquery -->
    <script src="{{ asset('fileofdesgin_dashbord/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('fileofdesgin_dashbord/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';
    </script>

    <!-- chart -->
    <script src="{{ asset('fileofdesgin_dashbord/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset('fileofdesgin_dashbord/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset('fileofdesgin_dashbord/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset('fileofdesgin_dashbord/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('fileofdesgin_dashbord/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="{{ asset('fileofdesgin_dashbord/js/sweetalert2.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset('fileofdesgin_dashbord/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset('fileofdesgin_dashbord/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset('fileofdesgin_dashbord/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('fileofdesgin_dashbord/js/custom.js') }}"></script>

    @stack('js')
</body>

</html>
