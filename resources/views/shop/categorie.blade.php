

@extends('shop.layouts.shop')


@section('content')

	<!-- Page Info -->
	<div class="page-info-section page-info-big">
		<div class="container">
			<h2>Dresses</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<span>Dresses</span>
			</div>
			<img src="shop/img/categorie-page-top.png" alt="" class="cata-top-pic">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area categorie-page spad">
		<div class="container">
			<div class="categorie-filter-warp">
				<p>{{ "Прикажани " . $products->count() . " резултати"  }}</p>
				<div class="cf-right">
					<div class="cf-layouts">
						<a href="#"><img src="shop/img/icons/layout-1.png" alt=""></a>
						<a class="active" href="#"><img src="shop/img/icons/layout-2.png" alt=""></a>
					</div>
					<form action="#">
						<select>
							<option>Color</option>
						</select>
						<select>
							<option>Brand</option>
						</select>
						<select>
							<option>Sort by</option>
						</select>
					</form>
				</div>
			</div>
			<div class="row">
                @foreach($products as $product)
                <div class="col-lg-3" style="display: flex; align-items: flex-end">
					<div class="product-item">
						<figure>
							<img src="{{ asset("storage/products/$product->image") }}" alt="">
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
						</figure>
						<div class="product-info">
							<h6>{{ $product->name }}</h6>
							<p>{{ number_format($product->price, 2) . ' ден' }}</p>
							<a href="{{ route('product.show', $product->id) }}" class="site-btn btn-line">Во Кошничка</a>
						</div>
					</div>
                </div>
                @endforeach
{{--                <div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/2.jpg" alt="">--}}
{{--							<div class="bache">NEW</div>--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Hype grey shirt</h6>--}}
{{--							<p>$19.50</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/3.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>long sleeve jacket</h6>--}}
{{--							<p>$59.90</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/4.jpg" alt="">--}}
{{--							<div class="bache sale">SALE</div>--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Denim men shirt</h6>--}}
{{--							<p>$32.20 <span>RRP 64.40</span></p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/5.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Long red Shirt</h6>--}}
{{--							<p>$39.90</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/6.jpg" alt="">--}}
{{--							<div class="bache">NEW</div>--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Hype grey shirt</h6>--}}
{{--							<p>$19.50</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/7.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>long sleeve jacket</h6>--}}
{{--							<p>$59.90</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/8.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Denim men shirt</h6>--}}
{{--							<p>$32.20 <span>RRP 64.40</span></p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/9.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Long red Shirt</h6>--}}
{{--							<p>$39.90</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/10.jpg" alt="">--}}
{{--							<div class="bache">NEW</div>--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Hype grey shirt</h6>--}}
{{--							<p>$19.50</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/11.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>long sleeve jacket</h6>--}}
{{--							<p>$59.90</p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-3">--}}
{{--					<div class="product-item">--}}
{{--						<figure>--}}
{{--							<img src="shop/img/products/12.jpg" alt="">--}}
{{--							<div class="pi-meta">--}}
{{--								<div class="pi-m-left">--}}
{{--									<img src="shop/img/icons/eye.png" alt="">--}}
{{--									<p>quick view</p>--}}
{{--								</div>--}}
{{--								<div class="pi-m-right">--}}
{{--									<img src="shop/img/icons/heart.png" alt="">--}}
{{--									<p>save</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</figure>--}}
{{--						<div class="product-info">--}}
{{--							<h6>Denim men shirt</h6>--}}
{{--							<p>$32.20 <span>RRP 64.40</span></p>--}}
{{--							<a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
			</div>
			<div class="site-pagination">
				<span class="active">01.</span>
				<a href="">02.</a>
				<a href="">03.</a>
				<a href="">04.</a>
				<a href="">05.</a>
				<a href="">06</a>
			</div>
		</div>
	</div>
	<!-- Page -->
@endsection


