@extends('client.layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("/fontend/home/home.css") }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset("/fontend/home/home.js") }}">
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="row">
				@include('client.components.sidebar')

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Kết quả tìm kiếm</h2>
                        @if($products->isEmpty())
        <h1>Không tìm thấy kết quả.</h1>
    @else

						@foreach($products as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<a href="{{route('detail',['id' => $pro->id])}}">
									<div class="productinfo text-center">
											<img src="{{$pro->product_image }}" alt="" />
											<h2>{{$pro->product_price}}</h2>
											<p>{{$pro->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$pro->product_price}}</h2>
												<p>{{$pro->product_name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
									</a>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{route('storeWishlist',['id' => $pro->id])}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a onclick="#" href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
                        @endif
					</div><!--features_items-->

				
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/fontend/images/recommend1.jpg') }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/fontend/images/recommend2.jpg') }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/fontend/images/recommend3.jpg') }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
@endsection

