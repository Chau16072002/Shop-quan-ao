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
                <div class="product-details">
                    <!--product-details-->

                    @foreach($product as $pro)
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{$pro->product_image}}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active" style=" height:60px; display: inline-block;">
                                    @foreach($pro->images as $ImageItem)
                                    <img style="width: 60px;" src="{{$ImageItem->image_path}}" alt="">
                                    @endforeach




                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{$pro->product_name}}</h2>
                            <p>Web ID: {{$pro->id}}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <form action="{{ route('cart_store') }}" method="POST">
                                @csrf
                                <span>
                                    <span>{{$pro->product_price}}</span>
                                    <label>Quantity:</label>
                                    <input name="qty" type="number" value="1" />
                                    <input name="productid_hidden" type="hidden" value="{{$pro->id}}" />
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                            </form>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Category:</b> {{$pro->category->category_name}}</p>
                            <p><b>Brand:</b>{{$pro->brand->brand_name}}</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                    alt="" /></a>
                        </div>
                        <!--/product-information-->
                    </div>
                    @endforeach
                </div>
                <!--/product-details-->

                @foreach($product as $pro)
                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

                            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">
                            <p>{!!$pro->product_desc!!}</p>

                        </div>

                        <div class="tab-pane fade" id="companyprofile">
                            <p>{!!$pro->product_content!!}</p>


                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="col-sm-12">

                                <p><b>Ratting</b></p>
                                <ul class="list-inline">
                                    @for($count=1;$count<=5;$count++)  
									@php if($count<=$rating1){
										 $color='color:#ffcc00;'
                                        ; }
										 else{ $color='color:#ccc;' ; 
										}
										  @endphp
										   <li id="{{$pro->id}}-{{$count}}"
                                        data-index="{{$count}}" data-product_id="{{$pro->id}}"
                                        data-rating="{{$rating1}}" class="rating" data-url="{{ route('insert_rating',['id' =>$pro->id,'rating' =>$count]) }}"
                                        style="cursor:pointer; {{$color}} font-size:30px;">&#9733</li>
                                        @endfor
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->
                @endforeach


            </div>
        </div>
        <div class="recommended_items">
            <!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($relativeProducts as $relative )


                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$relative->product_image}}" alt="" />
                                        <h2>{{$relative->product_price}}</h2>
                                        <p>{{$relative->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

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
</section>
@endsection