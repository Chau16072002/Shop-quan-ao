<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\ProductAddRequest;



session_start();

class ProductController extends Controller
{
    private $category;
    private $productImage;
   use StorageImageTrait;
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    
    public function __construct(Category $category, Product $product, ProductImage $productImage){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }
   
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        $brandes = Brand::where('brand_status',1)->get();
        return view('admin.add_product',compact('brandes','htmlOption'));
    }
    public function index() {
        $this->AuthLogin();

        $products =  $this->product->latest()->paginate(5);
        return view('admin.all_product', compact('products'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request){
            $dataProduct = [
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' =>$request->brand_id,
                'product_status' => $request->product_status
            ];
            $data = $this->storageTraitUpload($request,'product_image','product');
            if(!empty($data)){
                $dataProduct['product_image'] = $data['file_path'];
    
            }
            $product = $this->product->create($dataProduct);
            session()->flash('message', 'Thêm danh mục sản phẩm thành công !!!');
            return redirect()->route('product_create');            

        //Insert data to product images
        if($request->hasFile('image_path')){
            foreach($request->image_path as $fileItem){
                $dataChitietHinhAnhProduct = $this->storageTraitUploadMutiple($fileItem,'product');
                $product->images()->create(
                    [    
                        'image_path' =>  $dataChitietHinhAnhProduct['file_path']
                    ]
                );
            }
            
            session()->flash('message', 'Thêm danh mục sản phẩm thành công !!!');
            return redirect()->route('product_create');   
        }
    

    }
    public function unactive_Product($id) {
        $this->AuthLogin();
        $data = $this->product->where('product_id', $id)->update(['product_status'=>1]);
        session()->put('message', 'Hiển sản phẩm thành công');
        return redirect()->route('product_index');

    }

    public function active_Product($id) {
        $this->AuthLogin();
        $data = $this->product->where('product_id', $id)->update(['product_status'=>0]);
        session()->put('message', 'Ẩn sản phẩm thành công');
        return redirect()->route('product_index');
    }

    public function edit($id)
    {
       
        $brandes = Brand::where('brand_status',1)->get();
        $product = $this->product->find($id);
        
        $htmlOption = $this->getCategory($product->category_id);

        return view('admin.edit_product', compact('htmlOption','product','brandes'));

    }

    public function update($id, Request $request)
    {
        $dataProductUpdate = [
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
            'product_content' => $request->product_content,
            'category_id' => $request->category_id,
            'brand_id' =>$request->brand_id,
            'product_status' => $request->product_status
        ];
        $data = $this->storageTraitUpload($request,'product_image','product');
        if(!empty($data)){
            $dataProductUpdate['product_image'] = $data['file_path'];

        }
        $this->product->find($id)->update($dataProductUpdate);  
        $product = $this->product->find($id);          

    //Insert data to product images
    if($request->hasFile('image_path')){
        $this->productImage->where('product_id', $id)->delete();
        foreach($request->image_path as $fileItem){
            $dataChitietHinhAnhProduct = $this->storageTraitUploadMutiple($fileItem,'product');
            $product->images()->create(
                [    
                    'image_path' =>  $dataChitietHinhAnhProduct['file_path']
                ]
            );
        }
        
        session()->flash('message', 'Cập nhập sản phẩm thành công !!!');
        return redirect()->route('product_index');   
    }

       
    }
    public function delete($id){
        try{
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        }catch(\Exception $exception){
            Log::error('Message:' . $exception->getMessage(). '--- Line: '. $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'

            ], 500);

        }
        
    }
}