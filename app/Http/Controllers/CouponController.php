<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
session_start();
class CouponController extends Controller
{
    public function __construct(Coupon $coupon){
        $this->coupon = $coupon;
    }
    public function insert_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function delete_coupon($id){
        $coupon = $this->coupon->find($id);
        $coupon->delete();
        Session::put('message','Xóa mã giảm giá thành công');
        return redirect()->route('list_coupon');
    }
    public function del_coupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){

            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công!!');
        }
    }
    public function list_coupon(){
        $coupon = $this->coupon->latest()->paginate(5);
        return view('admin.coupon.list_coupon', compact('coupon'));
    }
    public function insert_coupon_code(Request $request){
        $data = $request->all();
        $coupon = new Coupon;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        Session::put('message','Thêm mã giảm giá thành công');
        return redirect()->route('insert_coupon');
    }
}
