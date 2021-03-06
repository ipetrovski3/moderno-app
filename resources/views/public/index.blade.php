@extends('public.layouts.app')
<!-- End Top Search -->
@section('content')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @foreach($images as $image)
        <li class="text-center">
            <img src="{{ asset('storage/main/' . $image->image) }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong> {{ $image->title }}</strong></h1>
                        <p class="m-b-40">{{ $image->description }}</p>
                        <p><a class="btn hvr-hover" href="{{$image->url}}">Погледни</a></p>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <h1 class="text-center">КАТЕГОРИИ</h1>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('storage/categories/' . $category->image) }}" alt="" />
                    <a class="btn hvr-hover" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Препорачани производи</h1>
                    <p>Листа од моментално нај актуелните производи</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">Најнови</button>
                        <button data-filter=".top-featured">Модерно препорака</button>
                        <button data-filter=".best-seller">Најпродавани</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            @foreach($products as $key => $product)
            <div class="col-lg-3 col-md-6 special-grid {{ Helpers::set_product_class($product->option) }}">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="{{ $product->option == 1 ? 'new' : 'sale' }}">{{ $product->options[$product->option] }}</p>
                        </div>
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Преглед"><i class="fas fa-eye"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Во кошничка</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>{{ $product->name }}</h4>
                        <h5>{{ number_format($product->price, 2, ',', '.') }} ден.</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
@endsection
