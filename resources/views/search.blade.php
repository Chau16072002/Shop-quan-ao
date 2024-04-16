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
									<img style="width: 300px; height: 300px;"
                                                src="{{ asset("$pro->product_image") }}" alt="">
											<h2>{{$pro->product_price}}</h2>
											<p style="max-width: 300px; overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$pro->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</a>
								</div>
								<div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <?php $value = session()->get('cus_id');
								if($value != null):?>

                                    <li><a data-url="{{ route('storeWishlist', ['id' =>$pro->id]) }}"
                                            class="action_wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                    </li>
                                    <?php
								endif; if($value == null):?>
                                    <li><a href="/dang-nhap"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
							</div>
						</div>
						@endforeach
                        @endif
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection

