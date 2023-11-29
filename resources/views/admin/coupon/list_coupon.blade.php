@extends('admin.layouts.admin_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/backend/slider/slider.css') }}">
@endsection
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê mã giảm giá
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
              <th>Tên mã giảm giá</th>
              <th>Mã giảm giá</th>
              <th>Số lượng giảm giá</th>
              <th>Điều kiện giảm giá</th>
              <th>Số giảm</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($coupon as $coupons)
            <tr>
              <td>{{ $coupons->coupon_name }}</td>
              <td>{{ $coupons->coupon_code }}</td>
              <td>{{ $coupons->coupon_time }}</td>
              <td><span class="text-ellipsis">
                <?php
                    if ($coupons->coupon_condition==1){
                ?>
                    Giảm theo %
                <?php
                    }else {
                ?>
                    Giảm theo tiền
                <?php
                    }
                ?>
            </span></td>

            <td><span class="text-ellipsis">
                <?php
                    if ($coupons->coupon_condition==1){
                ?>
                    Giảm {{ $coupons->coupon_number }} %
                <?php
                    }else {
                ?>
                    Giảm {{ $coupons->coupon_number }} tiền
                <?php
                    }
                ?>
            </span></td>

              <td>

                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{ route('delete_coupon', ['id' => $coupons->coupon_id]) }}" class="active styling-edit" ui-toggle-class="">
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
            <small class="text-muted inline m-t-sm m-b-sm">showing 1-5 items.</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
                {{ $coupon->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
