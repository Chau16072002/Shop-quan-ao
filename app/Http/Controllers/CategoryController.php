<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();


class CategoryController extends Controller
{
    private $category;

    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }

    public function __construct(Category $category){
        $this->category = $category;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add_category_product', compact('htmlOption'));
    }

    public function index() {
        $this->AuthLogin();

        $categories =  $this->category->latest()->paginate(5);
        return view('admin.category.all_category_product', compact('categories'));
    }

    public function unactive_category($id) {
        $this->AuthLogin();
        $data = $this->category->where('id', $id)->update(['category_status'=>1]);
        session()->put('message', 'Hiển thị danh mục sản phẩm thành công');
        return redirect()->route('category_index');

    }

    public function active_category($id) {
        $this->AuthLogin();
        $data = $this->category->where('id', $id)->update(['category_status'=>0]);
        session()->put('message', 'Ẩn danh mục sản phẩm sản phẩm thành công');
        return redirect()->route('category_index');
    }

    public function store(Request $request){

        $this->category->create([
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc,
            'parent_id' => $request->parent_id,
            'category_status' => $request->category_status
        ]);
        session()->flash('message', 'Thêm danh mục sản phẩm thành công !!!');
        return redirect()->route('category_create');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit_category_product', compact('category', 'htmlOption'));

    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('category_index');
    }

    public function delete($id){
        $this->category->find($id)->delete();
        session()->flash('message', 'Xóa danh mục sản phẩm thành công !!!');
        return redirect()->route('category_index');
    }
}
