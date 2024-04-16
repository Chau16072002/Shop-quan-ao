<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
use App\Models\Customer;


session_start();

class CartController extends Controller
{
    private $cart;

    public function AuthLogin(){
        $customer_id = session()->get('cus_id');
        if ($customer_id){
           return redirect('/');
        }else {
            return redirect('/dang-nhap')->send();
        }
    }
    public function __construct(Cart $cart){
        $this->cart = $cart;
    }
    public function add(Request $request){
        if(!session()->get('cus_id')){
            return response()->json(['success' => false]);
        }
        else{
            $data = [
                'customer_id' => session()->get('cus_id'),
                'product_id' =>  $request->input('productid'),
                'quantily' => 1,
                'price' => $request->input('productPrice')
            ];
            $product_id = $request->input('productid');
            $cart = Cart::where('product_id',$product_id)->first();
            if($cart){
                $cart->quantily++;
                $cart->save(); 
                return response()->json(['success' => true]);
            }
            else if($cart = $this->cart->create($data)){
                return response()->json(['success' => true]);
            }        
        }
    }
    public function show(){
    $customer_id = session()->get('cus_id');
    $cartItems = Cart::with('product')->where('customer_id', $customer_id)->get();
    return view('client.cart.show_cart', compact('cartItems'));
    }
    public function updateQuantity(Request $request) {
        $productId = $request->input('productid');
        $newQuantity = $request->input('quantity');
        $cartid = $request->input('cart_item_id');
        // Tìm sản phẩm trong cơ sở dữ liệu
        $cartItems = Cart::where('id',$cartid)->first();
        if (!$cartItems) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại'], 404);
        }
        // Cập nhật số lượng sản phẩm
        $cartItems->quantily = $newQuantity;
        $cartItems->save();  
        $cart = Cart::all();
        $total = 0;
        foreach($cart as $c){
            $total += $c->price * $c->quantily;
        }
        return response()->json(['success' => true, 'message' => 'Số lượng sản phẩm đã được cập nhật','total' => $total]);
    }
    public function deleteCart($id){
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['error' => 'Cart not found'], 404);
        }
        $cart->delete();
        return response()->json(['success' => 'cart deleted successfully']);
    }
}