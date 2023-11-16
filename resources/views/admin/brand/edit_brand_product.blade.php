@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
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
                        <form role="form" action="{{ route('brand_update', ['id' => $brand->id]) }}" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{ $brand->brand_name }}" class="form-control" name="brand_name" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" >{{ $brand->brand_desc }}</textarea>
                        </div>


                        <button type="submit" name="update_brand_product" class="btn btn-info">Sửa danh mục</button>
                        </form>
                    </div>


                </div>
            </section>
    </div>
</div>
@endsection
