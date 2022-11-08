@extends('new_design.layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Moderno MK<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Дома</a></li>
                    <li class="breadcrumb-item"><a href="#">Кошничка</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Нарачка</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
{{--                        <form action="#">--}}
{{--                            <input type="text" class="form-control" required id="checkout-discount-input">--}}
{{--                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>--}}
{{--                        </form>--}}
                    </div><!-- End .checkout-discount -->
                    <form action="{{ route('store.order') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Податоци за купувачот</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Име *</label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Презиме *</label>
                                        <input type="text" name="last_name" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->


{{--                                <label>Country *</label>--}}
{{--                                <input type="text" class="form-control" required>--}}

                                <label>Адреса *</label>
                                <input type="text" name="address" class="form-control" required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="country">Град *</label>
                                        <select class="form-control" name="town" id="country">
                                            <option value="">Изберете</option>
                                            @foreach (Helpers::towns() as $town)
                                                <option value="{{ $town }}">{{ $town }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Поштенски број *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">


                                    <div class="col-sm-6">
                                        <label>Телефон *</label>
                                        <input type="tel" name="phone" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6">
                                        <label>Емаил адреса *</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="custom-control custom-checkbox">
                                    <input checked type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Се согласувам да добивам промотивни понуди и новитети</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Забелешка</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Доколку имате некоја забелешка или посебно барање околу нарачката, Ве молиме наведете ги тука"></textarea>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td><a href="#">Beige knitted elastic runner shoes</a></td>
                                            <td>$84.00</td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Blue utility pinafore denimdress</a></td>
                                            <td>$76,00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                        Плаќање при достава
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Наплатата ќе биде извршена преку курирот од каргото.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-5">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">--}}
{{--                                                        Картичка--}}
{{--                                                        <img src="assets/images/payments-summary.png" alt="payments cards">--}}
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}
                                    </div><!-- End .accordion -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Нарачај</span>
                                        <span class="btn-hover-text">Потврдија нарачката</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main>
@endsection
