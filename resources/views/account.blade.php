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
    <div class="container">
        <H1>Hồ sơ của tôi</H1>
        <H4>Quản lý thông tin hồ sơ để bảo mật tài khoản</H4>
        <?php
        $message = Session::get('message');
    if ($message){
        echo '<span style="color: red";ß class="text-alert">'. $message .'</span>';
        session()->put('message', null);
    }
    ?>
        <div class="position-center">
            <form role="form" action="{{ URL::to('/edit-customer') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="row">
					<div class="col-md-9">
					<div class="form-group">
                    <label for="exampleInputEmail1">Tên</label>
                    <input type="text" class="form-control" value="{{ $account->cus_name }}" name="cus_name" required ="" id="exampleInputEmail1">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" value="{{ $account->cus_email }}" name="cus_email" required ="" id="exampleInputEmail1">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" class="form-control" value="{{ $account->cus_phone }}" name="cus_phone" required ="" id="exampleInputEmail1">
                    <label  for="Passwrd">Mật khẩu</label><br>
					<input type="hidden" class="form-control" value="{{ $account->cus_password }}" name="cus_password" id="exampleInputEmail1">
                    ******** <a href="/change-password">Đổi mật khẩu</a><br>
                    <label for="exampleInputEmail1">địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $account->cus_address }}" name="cus_address" required ="" id="exampleInputEmail1">
                </div>
					</div>
					 <div class="col-md-3">
						<div>
                            <?php if($account->cus_image == null){ ?>
						<label for="exampleInputEmail1"><i style="font-size: 20em;" class="fa fa-user"></i></label>
                        <?php } if($account->cus_image != null):?>
                            <img style="width: 300px; height: 300px;" src="{{ $account->cus_image }}" alt="avata">
                        <?php endif; ?>
                                <input type="file" class="form-control" name="cus_image" id="exampleInputEmail1">
						</div>
					 </div>
				</div>
               
                <button type="submit" name="cus_submit" class="btn btn-info">Sửa thông tin</button>
            </form>
        </div>
    </div>
 @endsection