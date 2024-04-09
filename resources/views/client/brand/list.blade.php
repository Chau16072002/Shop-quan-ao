@extends('client.layouts.master')
@section('title')
    <title>Brand</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("/fontend/home/home.css") }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset("/fontend/home/home.js") }}">
@endsection

@section('content')
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset("/fontend/images/girl1.jpg") }}" class="girl img-responsive" alt="" />
									<img src="{{ asset("/fontend/images/pricing.png") }}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset("/fontend/images/girl2.jpg") }}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset("/fontend/images/girl3.jpg") }}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				@include('client.components.sidebar')

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    
						<h2 class="title text-center">{{ $brand->brand_name }}</h2>
						<div class="col-md-4">
								<label for="amount">Sap xep theo</label>
								<form>
									@csrf
									<select name="sort" id="sort" class="form-control">
										<option value="{{Request::url()}}?sort_by=none">Loc</option>
										<option value="{{Request::url()}}?sort_by=tang_dan">Gia tang dan</option>
										<option value="{{Request::url()}}?sort_by=giam_dan">Gia giam dan</option>
										<option value="{{Request::url()}}?sort_by=kytu_az">A den Z</option>
										<option value="{{Request::url()}}?sort_by=kytu_za">Z den A</option>
										</select>
									</form>

							</div>
						</div>
						@foreach($products as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="{{route('detail',['id' => $pro->id])}}">
											<img src="{{$pro->product_image }}" alt="" />
											<h2>{{number_format($pro->product_price). ' '.'VND'}}</h2>
											<p>{{$pro->product_name}}</p>
                                        </a>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
					<div style="float: right; padding-bottom:50px;">
					{{ $products->links() }}
					</div>	
					

				

				</div>
			</div>
		</div>
	</section>
@endsection

