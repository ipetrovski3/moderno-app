
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
                                    <input wire:model="selected" type="checkbox" value="{{ $category->id }}" class="custom-control-input" id="{{"cat-$category->id"}}">
                                    <label class="custom-control-label" for="{{"cat-$category->id"}}">{{ $category->name }}</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">{{ $category->products->count() }}</span>
                            </div><!-- End .filter-item -->
                        @endforeach
                    </div><!-- End .filter-items -->
                    {{ var_export($selected) }}
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




