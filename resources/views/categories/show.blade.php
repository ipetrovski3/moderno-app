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
                            <form class="cart-form" id="cartFrom" action="" method="POST">
                                <input type="number" name="qty" value="1" placeholder="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary"> ВО КОШНИЧКА </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(this, function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                let product_id = $('input[name=product_id]', this).val()
                let qty = $('input[name=qty]', this).val()
                let cart = $('#currentCart')
                console.log(product_id)
                $.ajax({
                    type: "POST",
                    url: "{{ route('add_to_cart') }}",
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function(data) {
                        console.log(data)
                        $('form').trigger('reset')
                        $('#cartCounter').text(data)
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            });
        })
    </script>
@endsection
