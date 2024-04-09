<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\BrandProduct;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use Mail;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function index() {
        $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        $products = Product::Where('product_status',1)->latest()->paginate(6);
        return view('client.home.home',compact('categorys','brandes','products'));
    }
    public function login(){
        return view('cus_login');
    }
    public function register(){
        return view('cus_register');
    }
    public function contact(){
        return view('contact-us');
    }
    public function forgetPass(){
        return view('forgetPass');
    }
    public function postForgetPass(Request $request){
        $customer = DB::table('tbl_customer')->where('cus_email', $request->customer_email)->first();
        $securityCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $name = $customer->cus_name;
        $email = $customer->cus_email;
        //session()->put('securityCode', $securityCode);
        // Truyền biến $name và $securityCode sang view
        Mail::send('emails.check_email_forget', compact('name','securityCode'), function($email) use($customer){
            $email->subject('MyShopping - Lấy lại mật khẩu tài khoản');
            $email->to($customer->cus_email, $customer->cus_name);   
        });
        return view('confirmOTP',compact('securityCode','email'));
    }
    public function retsetnewpassword($email){
        return view('retsetnewpassword',compact('email'));
    }
}