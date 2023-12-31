@extends('client.layouts.master')
@section('title')
    <title>Cart page</title>
@endsection

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <form action="{{ url('/update-cart') }}" method="POST">
                        @csrf
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Hình ảnh</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="price">Giá sản phẩm</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Thành tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::get('cart') == true)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                        $total += $subtotal;
                                    @endphp

                                    <tr>
                                        <td class="cart_product">
                                            <img src="{{ $cart['product_image'] }}" width="50" alt="">
                                        </td>
                                        <td class="cart_name">
                                            <h4><a href=""></a></h4>
                                            <p>{{ substr($cart['product_name'], 0, 70) }}...</p>
                                        </td>

                                        <td class="cart_price">
                                            <p>{{ number_format($cart['product_price'], 0, ',', '.') }}đ</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input class="cart_quantity_input" type="text"
                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                    value="{{ $cart['product_qty'] }}">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">
                                                {{ number_format($subtotal, 0, ',', '.') }} đ
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                                href="{{ url('/delete-sp/' . $cart['session_id']) }}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                            class="check_out btn btn btn-default btn-sm">
                                    <td><a class="btn btn-default check_out" href="{{ url('/del-all-product') }}">Xóa tất cả</a></td>
                                    @if (Session::get('coupon'))
                                    <td><a class="btn btn-default check_out" href="{{ url('/del-coupon') }}">Xóa tất cả sản phẩm</a></td>
                                    @endif

                                    <td colspan="2">
                                        <li>Tổng: <span>{{ number_format($total, 0, ',', '.') }} đ</span></li>
                                        @if (Session::get('coupon'))
                                            <li>
                                                @foreach (Session::get('coupon') as $key => $cou)
                                                    @if ($cou['coupon_condition'] == 1)
                                                        Mã giảm : {{ $cou['coupon_number'] }} %
                                                        <p>
                                                            @php
                                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                echo '<p><li>Tổng giảm: ' . number_format($total_coupon, 0, ',', '.') . 'đ</li></p>';
                                                            @endphp
                                                        </p>
                                                        <p>
                                                            <li>Tổng đã giảm: {{ number_format($total - $total_coupon, 0, ',', '.') }} đ</li>
                                                        </p>
                                                    @elseif ($cou['coupon_condition'] == 2)
                                                    Mã giảm : {{ number_format($cou['coupon_number'], 0, ',', '.') }} K
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    </p>
                                                    <p>
                                                        <li>Tổng đã giảm: {{ number_format($total_coupon, 0, ',', '.') }} đ</li>
                                                    </p>
                                                    @endif
                                                @endforeach
                                            </li>
                                        @endif
                            </td>
                            </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <center>
                                        @php
                                            echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                        @endphp
                                    </center>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </form>
                    @if (Session::get('cart'))
                        <tr>
                            <td>
                                <form action="{{ url('/check-coupon') }}" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"
                                        width="50%"><br>
                                    <input type="submit" class="btn btn-default check_coupon" value="Tính mã giảm giá"
                                        name="check_coupon">
                                </form>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
