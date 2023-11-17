<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
session_start();

class BrandProduct extends Controller
{
    private $brand;
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }

    public function __construct(Brand $brand){
        $this->brand = $brand;
    }

    public function create() {
        $this->AuthLogin();
        return view('admin.brand.add_brand_product');
    }



    public function index() {
        $this->AuthLogin();

        $brands =  $this->brand->latest()->paginate(5);
        return view('admin.brand.all_brand_product', compact('brands'));
    }
    public function index1($id) {
        $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        $products = Product::Where('product_status',1)->where('brand_id',$id)->latest()->paginate(3);
        $brand_name = Brand::where('id',$id)->first();
        return view('client.brand.list',compact('categorys','brandes','products'))->with('brand', $brand_name);
        // return view('admin.brand.all_brand_product', compact('brands'));
    }
    public function unactive_brand($id) {
        $this->AuthLogin();
        $data = $this->brand->where('id', $id)->update(['brand_status'=>1]);
        session()->put('message', 'Hiển thị danh mục sản phẩm thành công');
        return redirect()->route('brand_index');

    }

    public function active_brand($id) {
        $this->AuthLogin();
        $data = $this->brand->where('id', $id)->update(['brand_status'=>0]);
        session()->put('message', 'Ẩn danh mục sản phẩm sản phẩm thành công');
        return redirect()->route('brand_index');
    }

    public function store(Request $request){

        $this->brand->create([
            'brand_name' => $request->brand_name,
            'brand_desc' => $request->brand_desc,
            'brand_status' => $request->brand_status
        ]);
        session()->flash('message', 'Thêm danh mục sản phẩm thành công !!!');
        return redirect()->route('brand_create');
    }

    // public function getBrand($parentId){
    //     $data = $this->brand->all();
    //     $recusive = new Recusive($data);
    //     $htmlOption = $recusive->categoryRecusive($parentId);
    //     return $htmlOption;
    // }

    public function edit($id)
    {
        $brand = $this->brand->find($id);

        return view('admin.brand.edit_brand_product', compact('brand'));

    }

    public function update($id, Request $request)
    {
        $this->brand->find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_desc' => $request->brand_desc,
        ]);

        return redirect()->route('brand_index');
    }

    public function delete($id){
        $this->brand->find($id)->delete();
        return redirect()->route('brand_index');
    }
}
