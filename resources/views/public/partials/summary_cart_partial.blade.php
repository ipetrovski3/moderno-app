<div class="order-box">
    <h3>Инфо за Нарачката</h3>
    <div class="d-flex">
        <h4>Износ</h4>
        <div class="ml-auto font-weight-bold"> {{ Cart::subtotal() }} ден.</div>
    </div>
    <hr class="my-1">
    {{--                        <div class="d-flex">--}}
    {{--                            <h4>Coupon Discount</h4>--}}
    {{--                            <div class="ml-auto font-weight-bold"> $ 10 </div>--}}
    {{--                        </div>--}}
    <div class="d-flex">
        <h4>ДДВ</h4>
        <div class="ml-auto font-weight-bold"> {{ Cart::tax() }} ден.</div>
    </div>
    <div class="d-flex">
        <h4>Карго</h4>
        <div class="ml-auto font-weight-bold"> {{ number_format(130, 2, ',', '.') }} ден.</div>
    </div>
    <hr>
    <div class="d-flex gr-total">
        <h5>Вкупно за наплата</h5>
        @php
            $grand_total = floatval(str_replace('.' , '', Cart::total())) + 130
        @endphp
        <div class="ml-auto h5"> {{ number_format($grand_total, 2, ',', '.') }} ден.</div>
    </div>
    <hr>
</div>
