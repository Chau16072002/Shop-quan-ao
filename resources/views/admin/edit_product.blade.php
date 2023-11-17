@extends('layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
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
                        <form role="form" action="{{ route('product_update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{$product->product_name}}" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" value="{{$product->product_price}}" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file"  class="form-control"  name="product_image" id="exampleInputEmail1" >
                                <div class="col-md-12">
                                    <div class="row"><img src="{{$product->product_image}}" alt="" height="100" width="100" ></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]" id="exampleInputEmail1" >
                                <div class="col-md-12">
                                    <div class="row">
                                       @foreach($product->images as $productImageItem)
                                        <div class="col-md-3">
                                         <img src="{{$productImageItem->image_path}}" alt=""  height="100" width="100">
                                        </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">{{$product->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="8"  class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm ">{{$product->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="category_id" value= "" class="form-control input-sm m-bot15">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                               
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach($brandes as $brands)
                                @if($brands->id == $product->brand_id)
                                <option selected value="{{$brands->id}}">{{$brands->brand_name}}</option>
                                        @else
                                        <option  value="{{$brands->id}}" >{{$brands->brand_name}}</option>                                  
                                        @endif
                                @endforeach       
                                
                                </select>
                            </div>

                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
