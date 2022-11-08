<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-cart table-mobile">
                <thead>
                <tr>
                    <th>Производ</th>
                    <th>Цена</th>
                    <th>Количина</th>
                    <th>Вк Цена</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($cart_items as $item)
                <tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ $item->options->image }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">{{ $item->name }}</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">{{ number_format($item->price, 2, ',', '.') . ' ден'}}</td>
                    <td class="quantity-col">
                        <div class="cart-product-quantity">
                            <input type="number" wire:model="quantity.{{ $item->rowId }}" class="form-control" min="1" max="10" step="1" data-decimals="0" required>
                        </div><!-- End .cart-product-quantity -->
                    </td>
                    <td class="total-col">{{ number_format($item->price * $item->qty, 2, ',', '.') . ' ден' }}</td>
                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
                @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->

            <div class="cart-bottom">
{{--                <div class="cart-discount">--}}
{{--                    <form action="#">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" class="form-control" required placeholder="coupon code">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>--}}
{{--                            </div><!-- .End .input-group-append -->--}}
{{--                        </div><!-- End .input-group -->--}}
{{--                    </form>--}}
{{--                </div><!-- End .cart-discount -->--}}
                <a href="#" wire:click.prevent="update_cart" class="btn btn-outline-dark-2"><span>Освежи</span><i class="icon-refresh"></i></a>
            </div><!-- End .cart-bottom -->
        </div><!-- End .col-lg-9 -->
        <aside class="col-lg-3">
            <div class="summary summary-cart">
                <h3 class="summary-title">Пресметка</h3><!-- End .summary-title -->

                <table class="table table-summary">
                    <tbody>
                    <tr class="summary-subtotal">
                        <td>Износ на Производите:</td>
                        <td>{{ $cart_total . ' ден.'}}</td>
                    </tr><!-- End .summary-subtotal -->
                    <tr class="summary-shipping">
                        <td>Достава:</td>
                        <td>&nbsp;</td>
                    </tr>

{{--                    <tr class="summary-shipping-row">--}}
{{--                        <td>--}}
{{--                            <div class="custom-control custom-radio">--}}
{{--                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">--}}
{{--                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>--}}
{{--                            </div><!-- End .custom-control -->--}}
{{--                        </td>--}}
{{--                        <td>$0.00</td>--}}
{{--                    </tr><!-- End .summary-shipping-row -->--}}

                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input" checked>
                                <label class="custom-control-label" for="standart-shipping">Карго:</label>
                            </div><!-- End .custom-control -->
                        </td>
                        <td><span wire:model="cargo">130,00</span> ден.</td>
                    </tr><!-- End .summary-shipping-row -->

{{--                    <tr class="summary-shipping-row">--}}
{{--                        <td>--}}
{{--                            <div class="custom-control custom-radio">--}}
{{--                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">--}}
{{--                                <label class="custom-control-label" for="express-shipping">Express:</label>--}}
{{--                            </div><!-- End .custom-control -->--}}
{{--                        </td>--}}
{{--                        <td>$20.00</td>--}}
{{--                    </tr><!-- End .summary-shipping-row -->--}}


                    <tr class="summary-total">
                        <td>Вкупно за Наплата</td>
                        <td><strong>{{ $grand_total . ' ден.'}}</strong></td>
                    </tr><!-- End .summary-total -->
                    </tbody>
                </table><!-- End .table table-summary -->

                <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">НАРАЧАЈ</a>
            </div><!-- End .summary -->

        </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
</div><!-- End .container -->
