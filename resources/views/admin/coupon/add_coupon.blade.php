@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
                </header>
                <?php
                    $message = Session::get('message');
                    if ($message){
                        echo '<span class="text-alert">'. $message .'</span>';
                        session()->put('message', null);
                    }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('insert_coupon_code') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" class="form-control" name="coupon_name" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã giảm giá</label>
                                <input type="text" class="form-control" name="coupon_code" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng mã</label>
                                <input type="text" class="form-control" name="coupon_times" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tính năng mã giảm giá</label>
                                <select name="coupon_condition" class="form-control input-sm m-bot15">
                                    <option value="0">----Chọn----</option>
                                    <option value="1">Giảm theo phầm trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập số % hoặc số tiền giảm</label>
                                <input type="text" class="form-control" name="coupon_number" id="" >
                            </div>

                            <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                        </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
