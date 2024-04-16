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
            <h2 class="title text-center">Product Detail</h2>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->

                    @foreach($product as $pro)
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{$pro->product_image}}" alt="" />
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
                            <?php $value = $pro->id; ?>
                            <img src="images/product-details/rating.png" alt="" />
                            <form action="" method="POST">
                                @csrf
                                <span>
                                    <span>{{$pro->product_price}} VND</span>
                                    <input type="hidden" class="product_id" value="{{$pro->id}}">
                                    <input type="hidden" class="product_price" value="{{$pro->product_price}}">
                                    <button type="button" class="btn btn-default add-to-cart">
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
                            <li class="active"><a href="#details" data-toggle="tab">Describe</a></li>
                            <li><a href="#ratings" data-toggle="tab">Evaluate</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews (<?php echo $commentCount ?>)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">
                            <p>{!!$pro->product_desc!!}</p>
                        </div>

                        <div class="tab-pane fade" id="companyprofile">
                            <p>{!!$pro->product_content!!}</p>


                        </div>
                        <div class="tab-pane fade" id="ratings">
                            <div class="col-sm-12">

                                <p><b>Ratting</b></p>
                                <ul class="list-inline " style="background: none">
                                    @for($count=1;$count<=5;$count++) @php if($count<=$rating1){ $color='color:#ffcc00;'
                                        ; } else{ $color='color:#ccc;' ; } @endphp <li id="{{$pro->id}}-{{$count}}"
                                        data-index="{{$count}}" data-product_id="{{$pro->id}}"
                                        data-rating="{{$rating1}}" class="rating"
                                        data-url="{{ route('insert_rating',['id' =>$pro->id,'rating' =>$count]) }}"
                                        style="cursor:pointer; {{$color}} font-size:30px;">&#9733</li>
                                        @endfor
                                </ul>

                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <h3>Comments</h3>
                                <?php
                                $vnTimeZone = new DateTimeZone('Asia/Ho_Chi_Minh');

                                // Lấy thời gian hiện tại theo múi giờ Việt Nam
                                $currentTimeVN = new DateTime('now', $vnTimeZone);
                                foreach($comments as $cmt):?>
                                <ul>
                                    <?php $image = $cmt->customer->cus_image; ?>
                                    <li><a href=""> <img style="width: 30px; height: 30px;"
                                                src="{{ asset("uploads/$image") }}" alt="avata">
                                            <span style="text-transform: none;">
                                                {{ $cmt->customer->cus_name }}</span></a>
                                    </li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>
                                            {{$cmt->updated_at->format('H:i A')}}</a></li>
                                    <li><a href=""><i
                                                class="fa fa-calendar-o"></i>{{$cmt->updated_at->format('d M Y')}}</a>
                                    </li>
                                    <?php if($cmt->customer->id == session()->get('cus_id')){ ?>
                                    <div id="comment-{{ $cmt->id }}">
                                        <button class="edit-comment" data-comment-id="{{ $cmt->id }}">Edit</button>
                                        <button class="delete-comment" data-comment-id="{{ $cmt->id }}">Delete</button>
                                        <div id="edit-form-{{ $cmt->id }}" style="display: none;">
                                        <textarea style="height: 50px;" id="edited-comment-{{ $cmt->id }}">{{ $cmt->message }}</textarea>
                                            <button class="save-edit" data-comment-id="{{ $cmt->id }}">Save</button>
                                        </div>
                                    </div>
                                    <?php }?>
                                </ul>
                                <p id="comment-content-{{ $cmt->id }}">{{$cmt->message}}</p>
                                <?php endforeach;?>
                                <p><b>Write Your Review</b></p>
                                <form role="form " action="">
                                    <input type="hidden" id="productid" name="productid" value="<?php echo $value ?>">
                                    <textarea id="comment-content" name="message" rows="4" cols="50"></textarea><br>
                                    <!-- <button type="button" id="btn-comment">Gửi</button> -->
                                    <button type="button" id="btn-comment">Gửi</button>
                                </form>

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
                                    <form>
                                        @csrf
                                        <a href="{{route('detail',['id' => $pro->id])}}">
                                            <img style="width: 300px; height: 300px;"
                                                src="{{ asset("$relative->product_image") }}" alt="">
                                            <h2>{{number_format($relative->product_price). ' '.'VND'}}</h2>
                                            <input type="hidden" class="product_id" value="{{$relative->id}}">
                                            <input type="hidden" class="product_price" value="{{$relative->product_price}}">
                                            <p
                                                style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{$relative->product_name}}</p>
                                        </a>
                                        <button type="button" class="btn btn-default add-to-cart"><i
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