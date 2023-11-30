@extends('admin.layouts.admin_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/backend/slider/slider.css') }}">
@endsection
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê slider
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
              <th>Tên</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->cus_name }}</td>
              <td><a href="mailto:{{ $customer->cus_email }}">{{ $customer->cus_email }}</a></td>
              <td>{{ $customer->cus_phone }}</td>
              <td>{{ $customer->cus_address }}</td>
              <td>
              <a href="{{ route('customer_edit', ['id' => $customer->id]) }}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{ route('customer_delete', ['id' => $customer->id]) }}" class="active styling-edit" ui-toggle-class="">
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
              {{ $customers->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
