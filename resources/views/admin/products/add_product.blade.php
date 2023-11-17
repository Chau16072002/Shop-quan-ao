@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="md-col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <header class="panel-heading">
                Thêm sản phẩm
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
                    <form role="form" action="{{ route('product_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name"
                                class="@error('product_name') is-invalid @enderror" placeholder="Tên sản phẩm" value="{{old('product_name')}}">
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price"
                                class="@error('product_price') is-invalid @enderror" id="exampleInputEmail1"
                                placeholder="Giá sản phẩm" value="{{old('product_price')}}">
                            @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror"
                                name="product_image" id="exampleInputEmail1" ">
                            @error('product_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh chi tiết</label>
                            <input type="file" multiple
                                class="form-control-file " name="image_path[]"
                                id="exampleInputEmail1"     >

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="8"
                                class="form-control @error('product_desc') is-invalid @enderror" name="product_desc"
                                id="exampleInputPassword1" placeholder="Mô tả sản phẩm" value="">{{old('product_desc')}}</textarea>
                            @error('product_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="8"
                                class="form-control @error('product_content') is-invalid @enderror"
                                name="product_content" id="exampleInputPassword1"
                                placeholder="Nội dung sản phẩm " value="">{{old('product_content')}}</textarea>
                            @error('product_content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="category_id" value=""
                                class="form-control input-sm m-bot15  @error('category_id') is-invalid @enderror" >
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>

                            <select name="brand_id"
                                class="form-control input-sm m-bot15 @error('brand_id') is-invalid @enderror "  >
                                @foreach($brandes as $brands)
                                <option value="{{$brands->id}}" name="{{$brands->id}}">{{$brands->brand_name}}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status"
                                class="form-control input-sm m-bot15 @error('product_status') is-invalid @enderror" >
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            @error('product_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
