@extends('public.layouts.app')
@section('content')


    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>

    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $category->name }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Дома</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <p>Вкупно производи од оваа категорија: {{ $products->count() }}</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">

                                                    <img src="{{ asset('/storage/products/'. $product->image) }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{ route('product.show', $product->id) }}"  data-toggle="tooltip" data-placement="right" title="Преглед"><i class="fas fa-eye"></i></a></li>
                                                        </ul>
{{--                                                        <a class="cart add_to_cart" data-id="{{ $product->id }}" href="#">Додади во кошничка</a>--}}
                                                    </div>
                                                </div>
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <div class="why-text">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h5>{{ number_format($product->price, 2 , ',', '.') . ' ден.' }}</h5>
                                                </div>
                                            </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    @foreach($products as $product)
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="{{ route('product.show', $product->id) }}" data-toggle="tooltip" data-placement="right" title="Преглед"><i class="fas fa-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <a href="{{ route('product.show', $product->id) }}" style=" :hover text-decoration: none !important;">
                                                <div class="why-text full-width">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h5>{{ number_format($product->price, 2 , ',', '.') . ' ден.' }}</h5>
                                                    <p>{{ $product->description }}</p>
{{--                                                    <a class="btn hvr-hover add_to_cart" data-id="{{ $product->id }}" href="">Додади во кошничка</a>--}}
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('click', '.add_to_cart', function(e) {
            e.preventDefault(e)
            let product_id = $(this).data('id')
            let qty = 1
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: "{{ route('add_to_cart') }}",
                data: { product_id, qty},
                success: function (data) {
                    $('#cart_count').text(data.count)
                    $('#side').empty()
                    $('#side').html(data.view)
                    Swal.fire({
                        html: "Производот е додаден во кошничката",
                        confirmButtonColor: '#b0b435'
                    })
                }
            })
        })
    </script>
@endsection
