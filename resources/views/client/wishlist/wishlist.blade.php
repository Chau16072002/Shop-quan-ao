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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">WishList</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
                            <td class="category">Category</td>
                            <td class="brand">Brand</td>
							<td class="price">Price</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                       @foreach($wishlist as $list)
						<tr>
							<td class="cart_product">
								<img src="{{$list->wishlists->product_image}}" class="" alt="" height="70" width="70" >
							</td>
							<td class="cart_description">
								
								<p>Web ID:{{$list->wishlists->id}}  </p>
							</td>
                            <td class="cart_category">
								<p>{{$list->wishlists->category->category_name}}</p>
							</td>
                            <td class="cart_brand">
								<p>{{$list->wishlists->brand->brand_name}}</p>
							</td>
							<td class="cart_price">
								<p>{{$list->wishlists->product_price}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$list->wishlists->product_price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete action_delete1" data-url="{{ route('wishlistDelete', ['id' =>$list->id]) }}" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
    @endsection
