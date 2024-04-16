@extends('client.layouts.master')
@section('title')
<title>Cart page</title>
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <?php
            $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php    $total = 0;?>
                    @foreach ($cartItems as $cartItem)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ $cartItem->product->product_image }}" width="50" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cartItem->product->product_name }}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cartItem->product->product_price).' '.'VND' }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="quantity">
                                <div class="quantity">
                                    <button class="btn-minus"
                                        onclick="updateQuantity({{ $cartItem->id }}, -1)">-</button>
                                    <input type="number" id="quantity_{{ $cartItem->id }}"
                                        value="{{ $cartItem->quantily }}" min="1"
                                        onchange="updateQuantity({{ $cartItem->id }}, 0)">
                                    <input type="hidden" id="productid_{{ $cartItem->product_id }}"-
                                        value="{{ $cartItem->product_id }}">
                                    <button class="btn-plus" onclick="updateQuantity({{ $cartItem->id }}, 1)">+</button>
                                </div>
                            </div>
                        </td>
                        <?php $totalamount = $cartItem->product->product_price * $cartItem->quantily;
                        $total +=  $totalamount?>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                //  echo number_format($total).' '.'VND';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a href="#" class="delete_form_cart" data-product-id="{{ $cartItem->id }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <h2 id="totalPrice" style="padding-right:50px; text-align: right; font-weight: bold; color: red;">Tổng tiền: <?php echo $total?></h2>
        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container">
        {{-- <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div> --}}
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng<span><?php echo $total ?></span></li>
                        <li>Thuế <span>{{ Cart::tax(0, ',', '.').' '.'VND' }}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{ Cart::total(0, ',', '.').' '.'VND' }}</span></li>
                    </ul>
                    {{-- <a class="btn btn-default update" href="">Update</a> --}}
                    <a class="btn btn-default check_out" href="">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
@endsection