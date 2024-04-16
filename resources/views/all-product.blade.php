@extends('client.layouts.master')
@section('title')
<title>All Product</title>
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
            <div class="col-sm-12 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">All Products</h2>
                    @foreach($products as $pro)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <form>
                                        @csrf
                                        <a href="{{route('detail',['id' => $pro->id])}}">
                                            <img style="width: 300px; height: 300px;"
                                                src="{{ asset("$pro->product_image") }}" alt="">
                                            <h2>{{number_format($pro->product_price). ' '.'VND'}}</h2>
                                            <input type="hidden" class="product_id" value="{{$pro->id}}">
                                            <input type="hidden" class="product_price" value="{{$pro->product_price}}">
                                            <p
                                                style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{$pro->product_name}}</p>
                                        </a>
                                        <button type="button" class="btn btn-default add-to-cart">Thêm giỏ hàng</button>
                                    </form>
                                </div>
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
                </div>
                <!--features_items-->
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
@endsection