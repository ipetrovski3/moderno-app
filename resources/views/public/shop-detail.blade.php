@extends('public.layouts.app')
@section('content')


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ strtoupper($product->name) }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"><img class="d-block w-100"
                                                                   src="{{ asset('/storage/products/' . $product->image) }}"
                                                                   alt="First slide"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        <h5>{{ number_format($product->price, 2, ',', '.') . ' ден.' }}</h5>
                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                        <p>
                        <h4>Опис:</h4>
                        <p>{{ $product->description }}</p>
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Количина</label>
                                    <input class="form-control" id="qty" data-product="{{ $product->id  }}" value="0"
                                           min="0" max="20" type="number">
                                    @if ($product->sizeable)
                                        <label class="control-label" for="">Големина</label>
                                        <select class="form-control" name="size" id="size">
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                        </select>
                                    @endif
                                </div>
                            </li>
                        </ul>


                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" id="add_to_cart" href="">Додај во кошничка</a>
                            </div>
                        </div>

                        <div class="add-to-btn">

                        </div>
                    </div>
                </div>
            </div>

            {{--			<div class="row my-5">--}}
            {{--				<div class="card card-outline-secondary my-4">--}}
            {{--					<div class="card-header">--}}
            {{--						<h2>Product Reviews</h2>--}}
            {{--					</div>--}}
            {{--					<div class="card-body">--}}
            {{--						<div class="media mb-3">--}}
            {{--							<div class="mr-2">--}}
            {{--								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--							</div>--}}
            {{--							<div class="media-body">--}}
            {{--								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--								<small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--							</div>--}}
            {{--						</div>--}}
            {{--						<hr>--}}
            {{--						<div class="media mb-3">--}}
            {{--							<div class="mr-2">--}}
            {{--								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--							</div>--}}
            {{--							<div class="media-body">--}}
            {{--								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--								<small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--							</div>--}}
            {{--						</div>--}}
            {{--						<hr>--}}
            {{--						<div class="media mb-3">--}}
            {{--							<div class="mr-2">--}}
            {{--								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--							</div>--}}
            {{--							<div class="media-body">--}}
            {{--								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--								<small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--							</div>--}}
            {{--						</div>--}}
            {{--						<hr>--}}
            {{--						<a href="#" class="btn hvr-hover">Leave a Review</a>--}}
            {{--					</div>--}}
            {{--				  </div>--}}
            {{--			</div>--}}

            {{--            <div class="row my-5">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <div class="title-all text-center">--}}
            {{--                        <h1>Featured Products</h1>--}}
            {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="featured-products-box owl-carousel owl-theme">--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).on('click', '#add_to_cart', function (e) {
            e.preventDefault()
            let qty = $('#qty').val()
            let product_id = $('#qty').data('product')
            let size = $('#size').val()
            if (qty == 0) {
                Swal.fire({
                    html: "Немате внесено количина",
                    confirmButtonColor: '#b0b435'
                })
            } else {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add_to_cart') }}",
                    data: {qty, product_id, size},
                    success: function (data) {
                        $('#cart_count').text(data.count)
                        $('#side').empty()
                        $('#side').html(data.view)
                    }
                })
            }
        })
    </script>
@endsection

