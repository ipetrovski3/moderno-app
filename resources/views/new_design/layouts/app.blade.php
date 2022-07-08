<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('new_design/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('new_design/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('new_design/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('new_design/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('new_design/images/icons/safari-pinned-tab.svg" color="#666666') }}">
    <link rel="shortcut icon" href="{{ asset('new_design/images/icons/favicon.ico') }}'">
    <meta name="apple-mobile-web-app-title" content="Moderno MK">
    <meta name="application-name" content="Moderno MK">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('new_design/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('new_design/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('new_design/css/style.css') }}">
</head>

<body>
    <div class="page-wrapper">
        @include('new_design.layouts.header')
        @yield('content')
        @include('new_design.layouts.footer')
    </div>
    <script src="{{ asset('new_design/js/jquery.min.js') }}"></script>
    <script src="{{ asset('new_design/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('new_design/js/superfish.min.js') }}"></script>
    <script src="{{ asset('new_design/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('new_design/js/main.js') }}"></script>
    @yield('js')
</body>
