@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h1 class="mt-4">{{ $category->name }}</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4">
                    {{-- <a href="{{ route('categories.show', $category->id) }}"> --}}
                    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                        <div class="card-header">{{ strtoupper($product->name) }}</div>
                        <div class="card-body">
                            <p class="card-text"><img src="{{ asset('storage/products/' . $product->image) }}"
                                    height="150" width="250" alt=""></p>
                            <p>Цена: {{ $product->price }} Ден</p>
                            <p>Опис: {{ $product->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                          <input type="hidden" name="product_id" value="{{ $product->id }}" >
                            <p class="ajaxTest"> ВО КОШНИЧКА </p>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.card-footer').css({'cursor': 'pointer'})
            $('.card-footer').on('click', this, function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                let product_id = $('input[name=product_id]', this).val()
                let cart = $('#currentCart')
                // console.log(cart)
                $.ajax({
                    type: "POST",
                    url: "{{ route('add_to_card') }}",
                    data:{ product_id: product_id },
                    success: function(data) {
                      let counter = cart.attr('data-count')
                      cart.text(counter)
                      console.log(data['cart_counter'])
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            });
        })
    </script>
@endsection
