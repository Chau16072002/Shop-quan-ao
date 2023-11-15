<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\BrandProduct;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        return view('pages.home',compact('categorys','brandes'));

    }
}
