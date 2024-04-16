@extends('client.layouts.master')
@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("/fontend/home/home.css") }}">
<style>
.image-container {
    max-width: 100%;
    height: auto;
    overflow: hidden;
    /* Đảm bảo hình ảnh không bị tràn ra khỏi container */
}

.image-container img {
    width: 100%;
    /* Hình ảnh sẽ chiếm toàn bộ chiều rộng của container */
    height: auto;
    /* Đảm bảo tỷ lệ khung hình bị thay đổi mà không bị biến dạng */
}
</style>
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset("/fontend/home/home.js") }}">
@endsection

@section('content')
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($sliders as $index => $slider)
                        <li data-target="#slider-carousel" data-slide-to="{{ $index }}"
                            {{ $index == 0 ? 'class=active' : '' }}></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($sliders as $index => $slider)
                        <div class="item {{ $index == 0 ? 'active' : '' }}">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{ $slider->name }}</h2>
                                <p>{{ $slider->description }}</p>
                                <!-- <button type="button" class="btn btn-default get">Shop Now</button> -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Đặt kích thước tối đa cho hình ảnh -->
                                <div class="image-container">
                                    <img src="{{ asset($slider->image_path) }}" class="girl img-responsive" alt="" />
                                    <!-- Nếu có hình ảnh pricing tương ứng với mỗi slider -->
                                    @if($slider->pricing_image_path)
                                    <img src="{{ asset($slider->pricing_image_path) }}" class="pricing" alt="" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

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
</section>
<!--/slider-->
<section>
    <div class="container">
        <div class="row">
            @include('client.components.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">New Products</h2>
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
                                        <button type="button" class="btn btn-default add-to-cart" ><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a></button>
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
                    {{ $products->links() }}
                </div>
                <!--features_items-->
                <br><br>
                <div class="recommended_items">
                    <!--recommended_items-->
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
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
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
                </div>
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
@endsection