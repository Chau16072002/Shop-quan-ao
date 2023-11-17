<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\BrandProduct;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        $products = Product::Where('product_status',1)->latest()->paginate(3);
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
}
