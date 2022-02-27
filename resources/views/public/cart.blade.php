@extends('public.layouts.app')

@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Производ</th>
                                    <th>Цена</th>
                                    <th>Количина</th>
                                    <th>Вкупно</th>
                                    <th>Избриши</th>
                                </tr>
                            </thead>
                            <tbody id="cart_items">
                                @include('public.partials.cart_items_partial')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Внеси купон за попуст" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Купон за попуст</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Освежи" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12 summary">
                    @include('public.partials.summary_cart_partial')
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ route('checkout') }}" class="ml-auto btn hvr-hover">Понатаму</a> </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.remove-pr', function() {
            rowId = $(this).data('id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('remove_from_cart') }}",
                data: { rowId },
                success: function (data) {
                    $('#cart_items').empty().html(data.items_view)
                    $('.summary').empty().html(data.summary_view)
                }
            })
        })
    </script>
@endsection
