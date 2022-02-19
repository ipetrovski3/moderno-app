

<div class="page-info-section page-info">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="">Home</a> /
            <a href="">Sales</a> /
            <a href="">Bags</a> /
            <span>Cart</span>
        </div>
        <img src="{{asset('shop/img/page-info-art.png')}}" alt="" class="page-info-art">
    </div>
</div>
<!-- Page Info end -->


<!-- Page -->
<div class="page-area cart-page spad">
    <div class="container">
        <div class="cart-table">
            <table>
                <thead>
                <tr>
                    <th class="product-th">Продукт</th>
                    <th>Цена</th>
                    <th>Количина</th>
                    <th class="total-th">Вкупно</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart_items as $item)

                    <tr>
                        <td class="product-col">
                            {{ dd($item) }}
                            <img src="{{ asset('storage/products/' . $item->image) }}" alt="">
                            <div class="pc-title">
                                <h4>{{ $item->name }}</h4>
                            </div>
                        </td>
                        <td class="price-col">{{ number_format($item->price + $item->tax, 2) . ' ден' }}</td>
                        <td class="quy-col">
                            <div class="quy-input">
                                <span>Кол</span>
                                <input type="number" value="{{ $item->qty }}">
                            </div>
                        </td>
                        <td class="total-col">{{ number_format($item->price * $item->qty, 2) . ' ден' }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row cart-buttons">
            <div class="col-lg-5 col-md-5">
                <div class="site-btn btn-continue">Сакам уште да нарачам</div>
            </div>
            <div class="col-lg-7 col-md-7 text-lg-right text-left">
                @csrf
                <div class="site-btn btn-clear" id="clear_cart">Изпразни Кошничка</div>
                <div class="site-btn btn-line btn-update">Обнови Кошничка</div>
            </div>
        </div>
    </div>
    <div class="card-warp">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="shipping-info">
{{--                        <h4>Shipping method</h4>--}}
{{--                        <p>Select the one you want</p>--}}
{{--                        <div class="shipping-chooes">--}}
{{--                            <div class="sc-item">--}}
{{--                                <input type="radio" name="sc" id="one">--}}
{{--                                <label for="one">Next day delivery<span>$4.99</span></label>--}}
{{--                            </div>--}}
{{--                            <div class="sc-item">--}}
{{--                                <input type="radio" name="sc" id="two">--}}
{{--                                <label for="two">Standard delivery<span>$1.99</span></label>--}}
{{--                            </div>--}}
{{--                            <div class="sc-item">--}}
{{--                                <input type="radio" name="sc" id="three">--}}
{{--                                <label for="three">Personal Pickup<span>Free</span></label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <h4>Купон за попуст</h4>
                        <p>Доколу имате купон за попуст внесете го во формата подоле</p>
                        <div class="cupon-input">
                            <input type="text">
                            <button class="site-btn">Внеси</button>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-6">
                    <div class="cart-total-details">
                        <h4>Инфо за плаќање и испорака</h4>
                        <ul class="cart-total-card">
                            <li>Вредност<span>{{ Cart::total() . ' ден' }}</span></li>
                            <li>Карго<span>130 ден</span></li>
                            <li class="total">Вкупно за плаќање<span><strong>{{ Cart::total() + 130 }} ден.</strong></span></li>
                        </ul>
                        <a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
