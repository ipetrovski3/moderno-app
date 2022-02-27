@extends('public.layouts.app')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Потврда на нарачката</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Нарачка</a></li>
                        <li class="breadcrumb-item active">Потврди</li>
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
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Податоци за испорака</h3>
                        </div>
                        <form class="needs-validation" action="{{ route('store.order') }}" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Име *</label>
                                    <input type="text" name="first_name" class="form-control" id="firstName"
                                           placeholder="" value="" required>
                                    @error('first_name')
                                        <div> <span class="text-danger"> {{ $message }} </span></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Презиме *</label>
                                    <input type="text" name="last_name" class="form-control" id="lastName"
                                           placeholder="" value="" required>
                                    @error('last_name')
                                    <div> <span class="text-danger"> {{ $message }} </span></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Емаил *</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="">
                                    @error('email')
                                    <div> <span class="text-danger"> {{ $message }} </span></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Телефон *</label>
                                    <input type="number" name="phone" class="form-control" id="email" placeholder="">
                                    @error('phone')
                                    <div> <span class="text-danger"> {{ $message }} </span></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Адреса *</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder=""
                                       required>
                                @error('address')
                                <div> <span class="text-danger"> {{ $message }} </span></div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Град *</label>
                                    <select class="wide w-100" name="town" id="country">
                                        <option value="">Изберете</option>
                                        @foreach (Helpers::towns() as $town)
                                            <option value="{{ $town }}">{{ $town }}</option>
                                        @endforeach
                                    </select>
                                    @error('town')
                                    <div> <span class="text-danger"> {{ $message }} </span></div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="receive_promotions" value="1" checked class="custom-control-input"
                                       id="same-address">
                                <label class="custom-control-label" for="same-address">Се согласувам да добивам
                                    интересни понуди за производите.</label>
                            </div>
                            <hr class="mb-4">
                            <button type="submit" class="ml-auto text-white p-4 btn hvr-hover">Потврди ја нарачката
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Кошничка</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @foreach(Cart::content() as $item)
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"><a href="detail.html"> {{ $item->name }}</a>
                                                <div class="small text-muted">
                                                    Цена: {{ number_format($item->price + $item->tax, 2, ',', '.') }}
                                                    <span class="mx-2">|</span>
                                                    Кол. {{ $item->qty }} <span class="mx-2">|</span>
                                                    Вкупно: {{ $item->total() }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="d-flex">
                                    <h4>Вкупно без ДДВ:</h4>
                                    <div class="ml-auto font-weight-bold"> {{ Cart::subtotal() }} .ден</div>
                                </div>
                                <hr class="my-1">
                                @if (isset($coupon))
                                    <div class="d-flex">
                                        <h4>Coupon Discount</h4>
                                        <div class="ml-auto font-weight-bold"> $ 10</div>
                                    </div>
                                @endif
                                <div class="d-flex">
                                    <h4>ДДВ:</h4>
                                    <div class="ml-auto font-weight-bold"> {{ Cart::tax() }} ден.</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Карго</h4>
                                    <div class="ml-auto font-weight-bold"> 130.00 ден.</div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Вкупно за наплата:</h5>
                                    @php
                                        $grand_total = floatval(str_replace(',', '', Cart::total())) + 130
                                    @endphp
                                    <div class="ml-auto h5"> {{ number_format($grand_total, 2, ',', '.') }} ден.</div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
