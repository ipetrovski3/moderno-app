<a href="{{ route('show.cart') }}">
  <div class="text-right" style="padding: 20px; position: fixed; bottom: 10; right: 100; z-index: 100;">
    <span style="font-size: 3em; color: rgb(0, 0, 0); padding: inherit">
      <i class="fas fa-shopping-cart"></i>
    </span>
    <span id="cartCounter" class="badge rounded-pill bg-success" style="position: absolute; margin-left: -20%">{{ Cart::count(); }}</span>
  </div>
</a>