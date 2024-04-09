<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="mailto:tribao0510@gmail.com"><i class="fa fa-envelope"></i>
                                    tribao0510@gmai.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/tribao05?locale=vi_VN" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/tribao05/?hl=vi" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/trang-chu"><img src="{{ asset("fontend/images/logo.png") }}" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('contact_us')}}"><i class="fa fa-envelope"></i> Contact</a></li>
                            <li><a href="{{route('showWishlist')}}"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{ URL::to('/gio-hang') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php $value = session()->get('cus_name');
								if($value != null):
									?>
                            <li><a href="/account"><i class="fa fa-user"></i> <?php echo $value; endif;?></a></li>
                            <?php if($value == null):
									?>
                            <li><a href="/dang-nhap"><i class="fa fa-lock"></i> <?php echo "Login"; endif;?></a></li>
                            <?php if($value != null):?>
                            <li><a href="{{ URL::to('/logoutCustomer') }}"><i class="fa fa-unlock"></i> Logout</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('trang_chu') }}" class="active">Home</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('search') }}" method="get">
                        <input type="text" name="keyword" placeholder="Keyword">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->