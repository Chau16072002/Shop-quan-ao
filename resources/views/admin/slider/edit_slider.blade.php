@extends('admin.layouts.admin_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('/backend/slider/slider.css') }}">
@endsection
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm slider
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
                        <form role="form" action="{{ route('slider_update', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Nhập tên" value="{{ $slider->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="8" class="form-control @error('description') is-invalid @enderror" name="description" id="" placeholder="Nhập mô tả">{{ $slider->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" id="">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Sửa danh mục</button>
                        </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
