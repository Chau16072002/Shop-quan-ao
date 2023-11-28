@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sữa admin
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
                        <form role="form" action="{{ route('admin_update',['id' => $admins->admin_id]) }}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên admin</label>
                            <input type="text" value="{{ $admins->admin_name }}" class="form-control" name="admin_name" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" value="" class="form-control" name="admin_password" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{ $admins->admin_email }}" class="form-control" name="admin_email" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" value="{{ $admins->admin_phone }}" class="form-control" name="admin_phone" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>



                        <button type="submit" name="update_admin" class="btn btn-info">Cập nhật Admin</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
