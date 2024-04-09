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
<section id="slider">
    <!--slider-->
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset("/fontend/images/girl1.jpg") }}" class="girl img-responsive"
                                    alt="" />
                                <img src="{{ asset("/fontend/images/pricing.png") }}" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset("/fontend/images/girl2.jpg") }}" class="girl img-responsive"
                                    alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset("/fontend/images/girl3.jpg") }}" class="girl img-responsive"
                                    alt="" />
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
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $pro->id }}"
                                                class="form-control cart_product_id_{{ $pro->id }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $pro->product_name }}"
                                                class="form-control cart_product_name_{{ $pro->id }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $pro->product_image }}"
                                                class="form-control cart_product_image_{{ $pro->id }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $pro->product_price }}"
                                                class="form-control cart_product_price_{{ $pro->id }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="1"
                                                class="form-control cart_product_qty_{{ $pro->id }}">
                                        </div>
                                        <a href="{{route('detail',['id' => $pro->id])}}">
                                            <img style="width: 300px; height: 300px;"
                                                src="{{ asset("$pro->product_image") }}" alt="">
                                            <h2>{{number_format($pro->product_price). ' '.'VND'}}</h2>
                                            <p style="max-width: 300px; overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$pro->product_name}}</p>
                                        </a>
                                        <button type="button" class="btn btn-default add-to-cart" name="add-to-cart"
                                            data-id_product="{{ $pro->id }}">Thêm giỏ hàng</button>
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
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('/fontend/images/recommend2.jpg') }}" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
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