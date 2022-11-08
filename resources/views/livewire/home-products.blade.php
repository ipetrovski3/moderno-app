<main class="main">
    <div class="intro-slider-container mb-4">
        @foreach($images as $image)
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "responsive": {
                            "992": {
                                "nav": true,
                                "dots": true
                            }
                        }
                    }'>
            <div class="intro-slide" style="background-image: url({{asset('storage/main/'. $image->image)}});">
                <div class="container intro-content">
{{--                    <h3 class="intro-subtitle text-primary">all at 50% off</h3><!-- End .h3 intro-subtitle -->--}}
                    <h1 class="intro-title text-white">{{ $image->title }}</h1><!-- End .intro-title -->

                    <a href="{{ $image->url }}" class="btn btn-outline-primary-2 min-width-sm">
                        <span>ПРОВЕРИ</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-simple -->
        @endforeach
        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <div class="toolbox toolbox-filter">
            <div class="toolbox-left">

            </div><!-- End .toolbox-left -->
            <div class="toolbox-right">
                <ul class="nav-filter product-filter">
                    <li class="active"><a href="#" data-filter="*">Сите</a></li>
                    @foreach($categories as $category)
                    <li><a href="#" wire:click.prevent="sortProducts({{$category->id}})" data-filter=".{{ 'category-' . $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div><!-- End .toolbox-right -->
        </div><!-- End .filter-toolbox -->

        <div class="widget-filter-area" id="product-filter-area">
            <a href="#" class="widget-filter-clear">Clean All</a>

            <div class="filter-area-wrapper">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">
                                Category:
                            </h3><!-- End .widget-title -->

                            <div class="filter-items filter-items-count">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-1">
                                        <label class="custom-control-label" for="cat-1">Сите</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">24</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-2">
                                        <label class="custom-control-label" for="cat-2">Furniture</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">3</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-3">
                                        <label class="custom-control-label" for="cat-3">Lighting</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-4">
                                        <label class="custom-control-label" for="cat-4">Accessories</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">4</span>
                                </div><!-- End .filter-item -->


                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-5">
                                        <label class="custom-control-label" for="cat-5">Sale</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->
                            </div><!-- End .filter-items -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">
                                Sort by:
                            </h3><!-- End .widget-title -->

                            <div class="filter-items">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" checked id="sort-1" name="sortby">
                                        <label class="custom-control-label" for="sort-1">Default</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="sort-2" name="sortby">
                                        <label class="custom-control-label" for="sort-2">Popularity</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="sort-3" name="sortby">
                                        <label class="custom-control-label" for="sort-3">Average Rating</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="sort-4" name="sortby">
                                        <label class="custom-control-label" for="sort-4">Newness</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="sort-5" name="sortby">
                                        <label class="custom-control-label" for="sort-5">Price: Low to High</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="sort-6" name="sortby">
                                        <label class="custom-control-label" for="sort-6">Price: High to Low</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->
                            </div><!-- End .filter-items -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">
                                Colour:
                            </h3><!-- End .widget-title -->

                            <div class="filter-colors filter-colors-vertical">
                                <a href="#" style="background: #b87145;"><span>Brown</span></a>
                                <a href="#" style="background: #f0c04a;"><span>Yellow</span></a>
                                <a href="#" style="background: #333333;"><span>Black</span></a>
                                <a href="#" class="selected" style="background: #cc3333;"><span>Red</span></a>
                                <a href="#" style="background: #ebebeb;"><span>White</span></a>
                            </div><!-- End .filter-colors -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">
                                Price:
                            </h3><!-- End .widget-title -->

                            <div class="filter-price">
                                <div class="filter-price-text">
                                    Price Range:
                                    <span id="filter-price-range"></span>
                                </div><!-- End .filter-price-text -->

                                <div id="price-slider"></div><!-- End #price-slider -->
                            </div><!-- End .filter-price -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .filter-area-wrapper -->
        </div><!-- End #product-filter-area.widget-filter-area -->

        <div class="products-container" data-layout="fitRows">
            @foreach($products as $product)
                <div class="product-item lighting col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label">Out of stock</span>
                            <a href="product.html">
                                <img src="{{ $product->image }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action">
                                <a href="#" onclick="Livewire.emit('openModal', 'quick-view')" class="btn-product btn-quickview" title="Преглед"><span>Преглед</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">{{ number_format($product->price, 2, ',', '.') . ' ден.' }}</span>
                                {{--                        <span class="old-price">Was $480.00</span>--}}
                                {{--                                <div class="out-price">{{ $product->price }}</div><!-- End .out-price -->--}}
                            </div><!-- End .product-price -->

                            <div class="product-action">
                                <a href="#" wire:click.prevent="add_to_cart({{$product->id}})" class="btn-product btn-cart"><span>Додај во кошничка</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .product-item -->
            @endforeach

        </div><!-- End .products-container -->

    </div><!-- End .container -->

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

    <div wire:ignore.self class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container quickView-container">
                    <div class="quickView-content">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="product-left">
                                        <a href="#one" class="carousel-dot active">
                                            <img src="assets/images/popup/quickView/1.jpg">
                                        </a>
                                        <a href="#two" class="carousel-dot">
                                            <img src="assets/images/popup/quickView/2.jpg">
                                        </a>
                                        <a href="#three" class="carousel-dot">
                                            <img src="assets/images/popup/quickView/3.jpg">
                                        </a>
                                        <a href="#four" class="carousel-dot">
                                            <img src="assets/images/popup/quickView/4.jpg">
                                        </a>
                                    </div>
                                    <div class="product-right">
                                        <div class="owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
	                        "dots": false,
	                        "nav": false,
	                        "URLhashListener": true,
	                        "responsive": {
	                            "900": {
	                                "nav": true,
	                                "dots": true
	                            }
	                        }
	                    }'>
                                            <div class="intro-slide" data-hash="one">
                                                <img src="assets/images/popup/quickView/1.jpg" alt="Image Desc">
                                                <a href="popup/fullscreen.html" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="two">
                                                <img src="assets/images/popup/quickView/2.jpg" alt="Image Desc">
                                                <a href="popup/fullscreen.html" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="three">
                                                <img src="assets/images/popup/quickView/3.jpg" alt="Image Desc">
                                                <a href="popup/fullscreen.html" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="four">
                                                <img src="assets/images/popup/quickView/4.jpg" alt="Image Desc">
                                                <a href="popup/fullscreen.html" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <h2 class="product-title">Linen-blend dress</h2>
                                <h3 class="product-price">$60.00</h3>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <p class="product-txt">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue.</p>


                                <div class="details-filter-row product-nav product-nav-thumbs">
                                    <label for="size">color:</label>
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-1-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-2-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->

                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control">
                                            <option value="#" selected="selected">Select a size</option>
                                            <option value="s">Small</option>
                                            <option value="m">Medium</option>
                                            <option value="l">Large</option>
                                            <option value="xl">Extra Large</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div>


                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('livewire-ui-modal')

    <div class="more-container text-center mt-0 mb-7">
        <a href="{{ route('all.categories') }}" class="btn btn-outline-dark-3 btn-more"><span>погледни повеќе</span><i class="la la-refresh"></i></a>
    </div><!-- End .more-container -->
</main><!-- End .main -->

