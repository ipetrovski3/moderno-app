@extends('shop.layouts.shop')


@section('content')
	<!-- Page Info -->
    <div id="render">
        @include('shop.partials.cart_content')
    </div>
	<!-- Page end -->


@endsection

@section('js')
    <script>
        $('#clear_cart').on('click', function () {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('clear_cart') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val()
                    },
                    success:function (data)  {

                    }
                })
        })
    </script>
@endsection
