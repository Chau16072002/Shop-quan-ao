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
use App\Models\Wishlist;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Slider;

session_start();

class ProductController extends Controller
{
    private $category;
    private $productImage;
    private $product;
    private $wishlist;
    private $rating;
    private $comment;
    private $customer;
   use StorageImageTrait;
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }

    public function __construct(Rating $rating,Category $category, Product $product, ProductImage $productImage, Wishlist $wishlist, Comment $comment, Customer $customer){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->wishlist = $wishlist;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->customer = $customer;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        $brandes = Brand::where('brand_status',1)->get();
        return view('admin.products.add_product',compact('brandes','htmlOption'));
    }
    public function index1($id) {


         $products =  Product::where('id',$id)->where('product_status',1)->get();
         return view('client.wishlist.wishlist', compact('products'));
    }
    public function index() {
        $this->AuthLogin();

        $products =  $this->product->latest()->paginate(5);
        return view('admin.products.all_product', compact('products'));
    }
    public function allproudct() {
        $products =  $this->product->get();
        return view('all-product', compact('products'));
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
        else{
            session()->flash('message', 'Thêm danh mục sản phẩm thành công !!!');
            return redirect()->route('product_create');
        }


    }
    public function unactive_Product($id) {
        $this->AuthLogin();
        $data = $this->product->where('id', $id)->update(['product_status'=>1]);
        session()->put('message', 'Hiển sản phẩm thành công');
        return redirect()->route('product_index');

    }

    public function active_Product($id) {
        $this->AuthLogin();
        $data = $this->product->where('id', $id)->update(['product_status'=>0]);
        session()->put('message', 'Ẩn sản phẩm thành công');
        return redirect()->route('product_index');
    }

    public function edit($id)
    {

        $brandes = Brand::where('brand_status',1)->get();
        $product = $this->product->find($id);

        $htmlOption = $this->getCategory($product->category_id);

        return view('admin.products.edit_product', compact('htmlOption','product','brandes'));

    }

    public function update($id, Request $request)
    {
        $dataProductUpdate = [
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
            'product_content' => $request->product_content,
            'category_id' => $request->category_id,
            'brand_id' =>$request->brand_id

        ];
        $data = $this->storageTraitUpload($request,'product_image','product');
        if(!empty($data)){
            $dataProductUpdate['product_image'] = $data['file_path'];

        }
        $this->product->find($id)->update($dataProductUpdate);
        $product = $this->product->find($id);
        session()->flash('message', 'Cập nhập sản phẩm thành công !!!');


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
    else{
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
    public function storeWishlist($id) {
        $customerId = session()->get('cus_id');
    
        $wishlist1 = Wishlist::where('product_id', $id)->get();
        //dd($wishlist1->isEmpty());
        if ($wishlist1->isEmpty() == true) {
            $wishlist = $this->wishlist->create([
                'product_id' => $id,
                'customer_id' => $customerId
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
          
    
        } else {
            // Nếu wishlist đã tồn tại, bạn có thể xử lý thông báo ở đây
            return response()->json([
                'code' => 500,
                'message' => 'fail'

            ], 500);
    
        }
    }
    public function showWishlist(){
        $wishlist =  Wishlist::where('customer_id',session()->get('cus_id'))->get();

        return view('client.wishlist.wishlist',compact('wishlist'));
    }

    public function wishlistDelete($id){
        try{
            $this->wishlist->find($id)->delete();
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
    public function ProductDetail($id){
        $product = Product::where('id',$id)->get();
        $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        $comments = Comment::where('product_id',$id)->get();
        $rating =  Rating::where('product_id',$id)->avg('rating');
        $sliders = Slider::where('slider_status',1)->get();
        $rating1 = round($rating);
        //Lấy tổng số bình luận của 1 sản phẩm
        $commentCount = 0;
        foreach($comments as $count){
            $commentCount += 1;
        }
        foreach($product as $relativeProduct){
            $category_id = $relativeProduct->category_id;

        }
        $relativeProducts = Product::where('category_id',$category_id)->whereNotIn('id',[$id])->get();


        return view('client.detail.detail',compact('sliders','product','categorys','brandes','relativeProducts','rating1','comments','commentCount'));
    }


    //search
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products =  $this->product->where('product_name', 'like', '%' . $keyword . '%')
                           ->orWhere('product_desc', 'like', '%' . $keyword . '%')
                           ->get();
                           $categorys = Category::where('parent_id',0)->get();
        $brandes = Brand::where('brand_status',1)->get();
        return view('/search', compact('products','categorys','brandes'));
    }
    public function insert_rating($id,$rating){
        $rating = $this->rating->create([
            'product_id' => $id,
            'rating' => $rating
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    
    }


  

}
