<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moderno MK</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('new_design/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('new_design/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link rel="manifest" href="{{ asset('new_design/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('new_design/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('new_design/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('new_design/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('new_design/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('new_design/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('new_design/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/plugins/nouislider/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/css/demos/demo-11.css') }}">
    <!-- Alpine v2 -->
{{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}

    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>


<body>
    <div class="page-wrapper">
        @include('new_design.layouts.header')
        @yield('content')

        @include('new_design.layouts.footer')
    </div>
    @include('new_design.layouts.extras')

    <script src="{{ asset('new_design/js/jquery.min.js') }}"></script>
    <script src="{{ asset('new_design/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('new_design/js/superfish.min.js') }}"></script>
    <script src="{{ asset('new_design/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('new_design/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('new_design/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('new_design/js/wNumb.js') }}"></script>
    <script src="{{ asset('new_design/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('new_design/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('new_design/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('new_design/js/main.js') }}"></script>
    <script src="{{ asset('new_design/js/demos/demo-11.js') }}"></script>



    @livewireScripts
    @yield('js')
</body>
