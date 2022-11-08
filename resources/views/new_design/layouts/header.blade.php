<header class="header header-7">
    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('homepage') }}" class="logo">
                    <img src="{{ asset('images/logo-moderno.png') }}" alt="Moderno" width="60" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class=" active">
                            <a href="{{ route('homepage') }}" class="sf-with-ul">ДОМА</a>
                        </li>

                        <li class="megamenu-container">
                            <a href="category.html" class="sf-with-ul">КАТЕГОРИИ</a>
                            <div class="megamenu demo">
{{--                                <div class="menu-col">--}}
{{--                                    <div class="menu-title">Choose your demo</div><!-- End .menu-title -->--}}

{{--                                    <div class="demo-list">--}}
{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-1.html">--}}

{{--                                                <span class="demo-title">01 - furniture store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-2.html">--}}

{{--                                                <span class="demo-title">02 - furniture store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-3.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/3.jpg);"></span>--}}
{{--                                                <span class="demo-title">03 - electronic store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-4.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/4.jpg);"></span>--}}
{{--                                                <span class="demo-title">04 - electronic store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-5.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/5.jpg);"></span>--}}
{{--                                                <span class="demo-title">05 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-6.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/6.jpg);"></span>--}}
{{--                                                <span class="demo-title">06 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-7.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/7.jpg);"></span>--}}
{{--                                                <span class="demo-title">07 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-8.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/8.jpg);"></span>--}}
{{--                                                <span class="demo-title">08 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-9.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/9.jpg);"></span>--}}
{{--                                                <span class="demo-title">09 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item">--}}
{{--                                            <a href="index-10.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/10.jpg);"></span>--}}
{{--                                                <span class="demo-title">10 - shoes store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-11.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/11.jpg);"></span>--}}
{{--                                                <span class="demo-title">11 - furniture simple store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-12.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/12.jpg);"></span>--}}
{{--                                                <span class="demo-title">12 - fashion simple store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-13.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/13.jpg);"></span>--}}
{{--                                                <span class="demo-title">13 - market</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-14.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/14.jpg);"></span>--}}
{{--                                                <span class="demo-title">14 - market fullwidth</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-15.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/15.jpg);"></span>--}}
{{--                                                <span class="demo-title">15 - lookbook 1</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-16.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/16.jpg);"></span>--}}
{{--                                                <span class="demo-title">16 - lookbook 2</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-17.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/17.jpg);"></span>--}}
{{--                                                <span class="demo-title">17 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-18.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/18.jpg);"></span>--}}
{{--                                                <span class="demo-title">18 - fashion store (with sidebar)</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-19.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/19.jpg);"></span>--}}
{{--                                                <span class="demo-title">19 - games store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-20.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/20.jpg);"></span>--}}
{{--                                                <span class="demo-title">20 - book store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-21.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/21.jpg);"></span>--}}
{{--                                                <span class="demo-title">21 - sport store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-22.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/22.jpg);"></span>--}}
{{--                                                <span class="demo-title">22 - tools store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-23.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/23.jpg);"></span>--}}
{{--                                                <span class="demo-title">23 - fashion left navigation store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-24.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/24.jpg);"></span>--}}
{{--                                                <span class="demo-title">24 - extreme sport store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-25.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/25.jpg);"></span>--}}
{{--                                                <span class="demo-title">25 - jewelry store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-26.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/26.jpg);"></span>--}}
{{--                                                <span class="demo-title">26 - market store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-27.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/27.jpg);"></span>--}}
{{--                                                <span class="demo-title">27 - fashion store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-28.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/28.jpg);"></span>--}}
{{--                                                <span class="demo-title">28 - food market store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-29.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/29.jpg);"></span>--}}
{{--                                                <span class="demo-title">29 - t-shirts store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-30.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/30.jpg);"></span>--}}
{{--                                                <span class="demo-title">30 - headphones store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}

{{--                                        <div class="demo-item hidden">--}}
{{--                                            <a href="index-31.html">--}}
{{--                                                <span class="demo-bg" style="background-image: url(assets/images/menu/demos/31.jpg);"></span>--}}
{{--                                                <span class="demo-title">31 - yoga store</span>--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .demo-item -->--}}
{{--                                    </div><!-- End .demo-list -->--}}
{{--                                    <div class="megamenu-action text-center">--}}
{{--                                        <a href="#" class="btn btn-outline-primary-2 view-all-demos"><span>View All Demos</span><i class="icon-long-arrow-right"></i></a>--}}
{{--                                    </div><!-- End .text-center -->--}}
{{--                                </div><!-- End .menu-col -->--}}
                            </div><!-- End .megamenu -->

                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">ПРОДУКТИ</a>
                        </li>
                        <li>
                            <a href="#" class="sf-with-ul">КОНТАКТ</a>

                        </li>
                        <li>
                            <a href="blog.html" class="sf-with-ul">Блог</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
                <livewire:cart />
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
