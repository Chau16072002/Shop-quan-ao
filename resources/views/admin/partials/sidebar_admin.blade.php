
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('category_create') }}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{ route('category_index') }}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('brand_create') }}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{ route('brand_index') }}">Liệt kê thương hiệu sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('product_create') }}">Thêm sản phẩm</a></li>
						<li><a href="{{ route('product_index') }}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('slider_create') }}">Thêm slider</a></li>
						<li><a href="{{ route('slider_index') }}">Liệt kê slider</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Customer</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('customer_index') }}">Liệt kê Customer</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Admin</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('admin_create') }}">Thêm admin</a></li>
						<li><a href="{{ route('all_admin') }}">Liệt kê admin</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Contact</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('contact_index') }}">Liệt kê Contact</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('insert_coupon') }}">Thêm coupon</a></li>
                        <li><a href="{{ route('list_coupon') }}">Liệt kê Coupon</a></li>
                    </ul>
                </li>


            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
