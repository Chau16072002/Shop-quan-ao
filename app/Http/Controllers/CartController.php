<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\ProductImage;
use Cart;


session_start();

class CartController extends Controller
{
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function check_coupon(Request $request){
        $data = $request->all();
        print_r($data);
    }

    public function gio_hang(Request $request){

        return view('client.cart.cart_ajax');
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                    $cart[] = array(
                        'session_id' => $session_id,
                        'product_name' => $data['cart_product_name'],
                        'product_id' => $data['cart_product_id'],
                        'product_image' => $data['cart_product_image'],
                        'product_qty' => $data['cart_product_qty'],
                        'product_price' => $data['cart_product_price'],
                        );
                        Session::put('cart',$cart);
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();
        //  Section::destroy();
    }

    // public function add_cart_ajax(Request $request){
    //     $data = $request->all();
    //     $session_id = substr(md5(microtime()),rand(0,26),5);
    //     $cart = Session::get('cart');
    //     if($cart == true){
    //         $is_avaiable = 0;
    //         foreach($cart as $key => $val){
    //             if($val['id']==$data['cart_product_id']){
    //                 $is_avaiable++;
    //                 Session::put('cart',$cart);
    //             }
    //         }
    //         if ($is_avaiable == 0) {
    //             $cart[] = array(
    //                 'session_id' => $session_id,
    //                 'product_name' => $data['cart_product_name'],
    //                 'id' => $data['cart_product_id'],
    //                 'product_image' => $data['cart_product_image'],
    //                 'product_qty' => $data['cart_product_qty'],
    //                 'product_price' =>$data['cart_product_price']
    //             );
    //             Session::put('cart', $cart);
    //         }
    //     }else{
    //         $cart[] = array(
    //             'session_id' => $session_id,
    //             'product_name' => $data['cart_product_name'],
    //             'id' => $data['cart_product_id'],
    //             'product_image' => $data['cart_product_image'],
    //             'product_qty' => $data['cart_product_qty'],
    //             'product_price' =>$data['cart_product_price']
    //         );
    //         Session::put('cart', $cart);
    //     }

    //     Session::save();
    // }

    public function delete_product($session_id){
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r ($cart);
        // echo '</pre>';
        if($cart==true){
            foreach($cart as $key => $val){
                if ($val['session_id']==$session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công!!');
        }else{
            return redirect()->back()->with('message', 'Xóa sản phẩm không thành công!!');
        }
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật giỏ hàng thành công!!');
        }else{
            return redirect()->back()->with('message', 'Cập nhật giỏ hàng không thành công!!');
        }

    }

    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            return redirect()->back()->with('message', 'Xóa hết giỏ hàng thành công!!');
        }
    }

    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = $this->product->where('id',$productId)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);
        Cart::setGlobalTax(10);

        // Cart::destroy();
        return redirect('show_cart');

    }

    public function show_cart(){

        return view('client.cart.show_cart');
    }

    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        return redirect('show_cart');
    }

    public function update_cart_qty(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId, $qty);
        return redirect('show_cart');
    }
}
