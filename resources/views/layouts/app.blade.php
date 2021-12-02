<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet" />

    @yield('styles')

    <style type="text/css">
        @font-face {
            font-family: nikosh;
            src: url('{{ asset("fonts/Nikosh.tff") }}');
        }

        body {
            font-family: nikosh !important;
            font-size: 18px;
            background-image: url('{{ asset("uploads/bg_main.jpg") }}');
        }

        .login-page {
            background: #fffe60;
            animation: text-clip 10s 1;
            animation: color-change 10s infinite;

        }


        @keyframescolor-change {

            0% {
                background-color: #C2F1EF;
            }

            20% {
                background-color: #AEED61;
            }

            40% {
                background-color: #C2F1EF;
            }

            60% {
                background-color: #6CABF9;
            }

            80% {
                background-color: #C8A2F8;
            }

            100% {
                background-color: #F8A2F8;
            }


        }
    </Style>
</head>

<body class="hold-transition login-page">
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    @yield('scripts')
    <script>

    </script>
</body>

</html>
