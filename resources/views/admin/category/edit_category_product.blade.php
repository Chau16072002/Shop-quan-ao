@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sản phẩm
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
                        <form role="form" action="{{ route('category_update', ['id' => $category->id]) }}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" id="" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" class="form-control"  name="category_desc" id="" >{{ $category->category_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn danh mục cha</label>
                                <select name="parent_id" class="form-control input-sm m-bot15">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Sửa danh mục</button>
                        </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
