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
