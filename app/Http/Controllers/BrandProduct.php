<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    public function add_brand_product() {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }

    public function all_brand_product() {
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $maneger_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $maneger_brand_product);
    }

    public function save_brand_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand_product')->insert($data);
        session()->put('message', 'Thêm thương hiệu sản phẩm thành công');
        return redirect('/add-brand-product');
    }

    public function unactive_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
        session()->put('message', 'Hiển thị thương hiệu sản phẩm thành công');
        return redirect('/all-brand-product');

    }

    public function active_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status'=>0]);
        session()->put('message', 'Ẩn thương hiệu sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        $maneger_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $maneger_brand_product);
    }

    public function update_brand_product(Request $request, $brand_product_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        session()->put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        session()->put('message', 'Xóa thương hiệu sản phẩm thành công');
        return redirect('/all-brand-product');
    }
}
