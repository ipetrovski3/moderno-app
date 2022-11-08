<div class="col-lg-9">
    <div class="toolbox">
        <div class="toolbox-left">
            <div class="toolbox-info">

                Showing <span>9 of 56</span> Products
            </div><!-- End .toolbox-info -->
        </div><!-- End .toolbox-left -->

        <div class="toolbox-right">
            <div class="toolbox-sort">
                <label for="sortby">Sort by:</label>
                <div class="select-custom">
                    <select name="sortby" id="sortby" class="form-control">
                        <option value="popularity" selected="selected">Most Popular</option>
                        <option value="rating">Most Rated</option>
                        <option value="date">Date</option>
                    </select>
                </div>
            </div><!-- End .toolbox-sort -->
            <div class="toolbox-layout">
                <a href="category-list.html" class="btn-layout">
                    <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="10" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="10" height="4" />
                    </svg>
                </a>

                <a href="category-2cols.html" class="btn-layout">
                    <svg width="10" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                    </svg>
                </a>

                <a href="category.html" class="btn-layout active">
                    <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                    </svg>
                </a>

                <a href="category-4cols.html" class="btn-layout">
                    <svg width="22" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="18" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                        <rect x="18" y="6" width="4" height="4" />
                    </svg>
                </a>
            </div><!-- End .toolbox-layout -->
        </div><!-- End .toolbox-right -->
    </div><!-- End .toolbox -->

    <div class="products mb-3">
        <div class="row justify-content-center">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-4">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="{{ $product->image }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Преглед"><span>Преглед</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Додај во кошничка</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Women</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                {{ $product->price }}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-lg-4 -->
            @endforeach
        </div><!-- End .row -->

    </div><!-- End .products -->

    <nav aria-label="Page navigation">
        {{ $products->links() }}
    </nav>
</div><!-- End .col-lg-9 -->
<aside class="col-lg-3 order-lg-first">
    <div class="sidebar sidebar-shop">
        <div class="widget widget-clean">
            <label>Filters:</label>
            <a href="#" class="sidebar-filter-clear">Clean All</a>
        </div><!-- End .widget widget-clean -->

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                    Category
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-1">
                <div class="widget-body">
                    <div class="filter-items filter-items-count">
                        @foreach($categories as $category)
                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input wire:model="categoriesSelected" type="checkbox" value="{{ $category->id }}" class="custom-control-input" id="{{"cat-$category->id"}}">
                                    <label class="custom-control-label" for="{{"cat-$category->id"}}">{{ $category->name }}</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">{{ $category->products->count() }}</span>
                            </div><!-- End .filter-item -->
                        @endforeach
                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->


        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                    Price
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-5">
                <div class="widget-body">
                    <div class="filter-price">
                        <div class="filter-price-text">
                            Price Range:
                            <span id="filter-price-range"></span>
                        </div><!-- End .filter-price-text -->

                        <div id="price-slider"></div><!-- End #price-slider -->
                    </div><!-- End .filter-price -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->
    </div><!-- End .sidebar sidebar-shop -->
</aside>




