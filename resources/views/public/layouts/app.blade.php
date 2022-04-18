<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>Moderno MK</title>
    <meta name="keywords" content="eshop moderno skopje maicki dukseri print">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q1TL9ZJSY2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Q1TL9ZJSY2');
    </script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Start Main Top -->
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{ asset('/images/official_logo.png') }}" style="width: 108px" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('homepage') }}">ДОМА</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">ЗА НАС</a></li>
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">ПРОДАВНИЦА</a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="shop.html">Sidebar Shop</a></li>--}}
{{--                            <li><a href="shop-detail.html">Shop Detail</a></li>--}}
{{--                            <li><a href="cart.html">Cart</a></li>--}}
{{--                            <li><a href="checkout.html">Checkout</a></li>--}}
{{--                            <li><a href="my-account.html">My Account</a></li>--}}
{{--                            <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">КОНТАКТ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="{{ route('show.cart') }}">
                            <i class="fa fa-shopping-bag"></i>
                            <span id="cart_count" class="badge">{{ Cart::count() }}</span>
                            <p>КОШНИЧКА</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side" id="side">
            @include('public.sidemenu')
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->
@yield('content')
<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>Пријатели</h4>
                        <p>Ин ПОШТА РАДЕСКИ</p>
                        <p>БИМ Дизајн</p>
                        <p>Пакунг</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Информации</h4>
                        <ul>
                            <li><a href="{{ route('about') }}">За нас</a></li>
                            <li><a href="#">Политика на квалитет</a></li>
                            <li><a href="#">Информации за испорака</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>КОНТАКТ</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Адреса: Ул. Петар Манџуков бр. 191 <br>1000 Скопје,<br></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Телефон: <a href="">+38970662266</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:info@moderno.com.mk">info@moderno.com.mk</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-top-box">

                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">All Rights Reserved. &copy; {{ now()->year }} <a href="#">ModernoMK</a> | Powered by:
        <a href="https://html.design/">ipetrovski</a></p>
</div>
<!-- End copyright  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('front/js/jquery.superslides.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('front/js/inewsticker.js') }}"></script>
<script src="{{ asset('front/js/bootsnav.js') }}"></script>
<script src="{{ asset('front/js/images-loded.min.js') }}"></script>
<script src="{{ asset('front/js/isotope.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/baguetteBox.min.js') }}"></script>
<script src="{{ asset('front/js/form-validator.min.js') }}"></script>
<script src="{{ asset('front/js/contact-form-script.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
@yield('js')
</body>

</html>
