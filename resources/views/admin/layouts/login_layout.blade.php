<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
        <!-- Bootstrap -->
        <link href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ asset('theme/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ asset('theme/build/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/build/css/custom.min.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: white;
        }
    </style>
</head>
<body>

    @yield('loginContent')


    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('theme/vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('theme/vendors/nprogress/nprogress.js') }}"></script> --}}
    <script src="{{ asset('theme/vendors/validator/validator.js') }}"></script>
    <script src="{{ asset('theme/build/js/custom.min.js') }}"></script>
</body>
</html>
