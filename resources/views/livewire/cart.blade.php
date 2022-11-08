<div class="dropdown cart-dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <i class="icon-shopping-cart"></i>
        <span {{ $cart_count == 0 ? 'hidden' : '' }} class="cart-count">{{ $cart_count }}</span>
{{--        <span class="cart-txt">$ 164,00</span>--}}
    </a>
    @if($cart_count > 0)
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-cart-products">
            @foreach($content as $item)
            <div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="product.html">{{ $item->name }}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{ $item->qty }}</span>
                                                x {{ number_format($item->price, 2, ',', '.') . " ден" }}
                        </span>
                </div><!-- End .product-cart-details -->

                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="{{ $item->options->image }}" style="max-height: 40px" alt="product">
                    </a>
                </figure>
                <a href="#" wire:click="remove_from_cart('{{ $item->rowId }}')" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
            </div><!-- End .product -->
            @endforeach
        </div><!-- End .cart-product -->

        <div class="dropdown-cart-total">
            <span>Вкупно:</span>

            <span class="cart-total-price">{{ $cart_total }}</span>
        </div><!-- End .dropdown-cart-total -->

        <div class="dropdown-cart-action">
            <a href="{{ route('show.cart') }}" class="btn btn-primary">Кон Кошничката</a>
            <a href="checkout.html" class="btn btn-outline-primary-2"><span>Нарачај</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .dropdown-cart-total -->
    </div><!-- End .dropdown-menu -->
    @else
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-cart-action">
            <h6>Вашата кошничка е празна 🙁</h6>
        </div><!-- End .dropdown-cart-total -->
    </div>
   @endif

</div><!-- End .cart-dropdown -->
