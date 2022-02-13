<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>ModernoMK</title>
    <meta charset="UTF-8">
    <meta name="description" content="Moderno MK">
    <meta name="keywords" content="Moderno, eCommerce, print, shop, Macedonia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/css/animate.css') }}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

<!-- Header section -->
<header class="header-section">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <img src="{{ asset('images/official_logo.png') }}" style="max-width: 140px" alt="logo">
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <div class="header-right">
            <a href="{{ route('show.cart') }}" class="card-bag"><img src="{{ asset('shop/img/icons/bag.png') }}" alt=""><span id="cartCounter">{{ Cart::count() }}</span></a>
{{--            <a href="#" class="search"><img src="{{ asset('shop/img/icons/search.png') }}" alt=""></a>--}}
        </div>
        <!-- site menu -->
        <ul class="main-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">Дома</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">За нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Контакт</a>
            </li>
        </ul>

    </div>
</header>
<!-- Header section end -->


<!-- Hero section -->
@yield('content')



<section class="footer-top-section home-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-8 col-sm-12">
                <div class="footer-widget about-widget">
                    <img src="{{ asset('images/official_logo.png') }}" class="footer-logo" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
{{--                <div class="footer-widget">--}}
{{--                    <h6 class="fw-title">usefull Links</h6>--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">Partners</a></li>--}}
{{--                        <li><a href="#">Bloggers</a></li>--}}
{{--                        <li><a href="#">Support</a></li>--}}
{{--                        <li><a href="#">Terms of Use</a></li>--}}
{{--                        <li><a href="#">Press</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h6 class="fw-title">Мапа на сајтот</h6>
                    <ul>
                        <li><a href="#">Категории</a></li>
                        <li><a href="#">Најпродавани</a></li>
                        <li><a href="#">Контакт</a></li>
                        <li><a href="#">Услови</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h6 class="fw-title">Информации</h6>
                    <ul>
                        <li><a href="#">За нас</a></li>
                        <li><a href="#">Испораки</a></li>
                        <li><a href="#">Враќање</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h6 class="fw-title">Контакт</h6>
                    <div class="text-box">
                        <p>Модерно гроуп ДОО </p>
                        <p>Ул. Петар Манџуков бр.191, 1000 Скопје, </p>
                        <p>Тел: +38970662266</p>
                        <p>info@moderno.com.mk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer top section end -->

<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ipetrovski</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
</footer>
<!-- Footer section end -->

<script src="js/main.js"></script>
<!--====== Javascripts & Jquery ======-->
<script src="{{ asset('shop/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('shop/js/mixitup.min.js') }}"></script>
<script src="{{ asset('shop/js/sly.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('shop/js/main.js') }}"></script>
@yield('js')
</body>
</html>
