<a href="{{ route('show.cart') }}">
    <div class="text-right" style="padding: 20px; position: fixed; bottom: 10; right: 20; z-index: 100;">
        <span>
            <img src="{{ asset('images/cart.png') }}" style="width: 65px; height: 65px" alt="">
        </span>
        <span id="cartCounter" class="badge rounded-pill bg-success" style="position: absolute; margin-left: -10%">
            {{ Cart::count() }}
        </span>
    </div>
</a>
