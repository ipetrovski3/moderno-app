@extends('shop.layouts.shop')

@section('content')
    <section class="hero-section set-bg" data-setbg="shop/img/bg.jpg">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="hs-left"><img src="shop/img/slider-img.png" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
            <div class="hs-item">
                <div class="hs-left"><img src="shop/img/slider-img.png" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!-- Intro section -->
    <section class="intro-section spad pb-0">
        <div class="section-title">
            <h2>категории</h2>
        </div>
        <div class="intro-slider">
            <ul class="slidee">
                @foreach($categories as $category)
                    <li>
                        <div class="intro-item">
                            <figure>
                                <img src="shop/img/intro/1.jpg" alt="#">
                            </figure>
                            <div class="product-info">
                                <h5>{{ $category->name }}</h5>
                                <a href="{{ route('categories.show', $category->slug) }}" class="site-btn btn-line">Види</a>

                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Intro section end -->




    <!-- Footer top section -->
@endsection

