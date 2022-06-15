<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('custom.images.shortcut-icon')) }}" />
    <link href="{{ asset('public/lib/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('public/lib/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">

    @stack('css')
    
</head>
<body>