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
        <H1>Đổi mật khẩu</H1>
        <H4>Quản lý thông tin hồ sơ để bảo mật tài khoản</H4>
        <?php
    $message = Session::get('message');
    if ($message){
        echo '<span style="color: red";ß class="text-alert">'. $message .'</span>';
        session()->put('message', null);
    }
    ?>
        <div class="position-center">
            <form role="form" action="change-password" method="post">
                {{ csrf_field() }}
                <div class="form-group" style="position: relative;">
                    <label for="current_password">Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="current_password" placeholder="********" value="" require>
                    <a style="position: absolute; top: 54%; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    @if($errors->has('current_password'))
                        <span style="color: red;" class="error-text">
                            {{$errors->first('current_password') }}
                        </span>
                    @endif
                    </div>
                    <div class="form-group" style="position: relative;">
                    <label for="new_password">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password" placeholder="********" value="" require>
                    <a style="position: absolute; top: 54%; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    @if($errors->has('new_password'))
                        <span style="color: red;" class="error-text">
                            {{$errors->first('new_password') }}
                        </span>
                    @endif
                    </div>
                    <div class="form-group" style="position: relative;">
                    <label for="new_password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="********" value="" require> 
                    <a style="position: absolute; top: 54%; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    @if($errors->has('new_password_confirmation'))
                        <span style="color: red;" class="error-text">
                            {{$errors->first('new_password_confirmation') }}
                        </span>
                    @endif
                    </div>
              
                   

                <button type="submit" name="update_category_product" class="btn btn-info">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
    @endsection