@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa thông tin customer
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
                        <form role="form" action="{{ route('customer_update', ['id' => $customer->id]) }}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="cus_name" value="{{ $customer->cus_name }}" id="" required="">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="cus_email" value="{{ $customer->cus_email }}" id="" required="">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" name="cus_password" value="{{ $customer->cus_password }}" id="" required="">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" name="cus_phone" value="{{ $customer->cus_phone }}" id="" required="">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="cus_address" value="{{ $customer->cus_address }}" id="" required="">
                            </div>


                            <button type="submit" class="btn btn-info">Sửa Customer</button>
                        </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
