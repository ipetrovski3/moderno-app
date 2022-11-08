@extends('new_design.layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Кошничка<span>Модерно МК</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Дома</a></li>
                    <li class="breadcrumb-item"><a href="#">Продавница</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Кошничка</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <livewire:cart-items/>
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection
