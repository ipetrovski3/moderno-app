<a href="#" class="close-side"><i class="fa fa-times"></i></a>
<li class="cart-box">
    <ul class="cart-list">
        @foreach(Cart::content() as $item)
            <li>
                <a href="#" class="photo"><img src="/public/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                <h6><a href="#">{{ $item->name }} </a></h6>
                <p>{{ $item->qty }}x - <span class="price">{{ number_format($item->price + $item->tax, 2, ',', '.') }} ден.</span></p>
            </li>
        @endforeach
        <li class="total">
            <span class="float-right"><strong>Вкупно</strong>: {{ Cart::subtotal() }} ден.</span>
            <a href="{{ route('show.cart') }}" class="btn btn-default hvr-hover btn-cart">Продолжи</a>
        </li>
    </ul>
</li>
