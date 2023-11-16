@extends('admin.layouts.admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
            $message = Session::get('message');
            if ($message){
                 echo '<span class="text-alert">'. $message .'</span>';
                 session()->put('message', null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Hình ảnh sản phẩm</th>
              <th>Danh mục</th>
              <th>Thương hiệu</th>

              <th>Hiển thị</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $productItem)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $productItem->product_name }}</td>
              <td>{{ $productItem->product_price }}</td>
              <td><img src="{{ $productItem->product_image }}" height="100" width="100" alt=""></td>
              <td>{{ $productItem->category->category_name }}</td>
              <td>{{ $productItem->brand->brand_name }}</td>

              <td><span class="text-ellipsis">
                <?php
                    if ($productItem->product_status == 0){
                ?>
                    <a href="{{ route('unactive_product', ['id' =>$productItem->id]) }}"><span class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                <?php
                    }else {
                ?>
                    <a href="{{ route('active_product', ['id' =>$productItem->id]) }}"><span class="fa-thumbs-styling fa fa-thumbs-up"></span></a>
                <?php
                    }
                ?>
            </span></td>

              <td>
                <a href="{{ route('product_edit', ['id' =>$productItem->id]) }}" value="{{$productItem->id}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a  href="" data-url="{{ route('product_delete', ['id' =>$productItem->id]) }}" class="active styling-edit action_delete"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">

          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              {{ $products->links() }}
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
