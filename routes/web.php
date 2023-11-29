<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Fontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/dang-nhap',[HomeController::class, 'login']);
Route::get('/dang-ky',[HomeController::class,'register']);
Route::post('/',[CustomerController::class, 'login']);
Route::post('/dangky',[CustomerController::class,'register']);
Route::get('/logoutCustomer', [CustomerController::class, 'logout']);
Route::get('/account',[CustomerController::class, 'account']);
Route::get('/change-password',[CustomerController::class,'changePassword']);
Route::post('/edit-customer',[CustomerController::class,'editCustomer']);
Route::post('/change-password',[CustomerController::class,'saveUpdatePassword']);
Route::get('/brand/{id}',[BrandProduct::class,'index1'])->name('get_brand');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact_us');
Route::get('/detail/{id}',[ProductController::class,'ProductDetail'])->name('detail');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/contactt-us',[ContactController::class,'sendContact']);
//Backend
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang_chu');

//Backend
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('show_dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

//Category-Product
Route::prefix('categories')->group(function () {
    //Index
    Route::get('/category/{id}',[CategoryController::class,'index1'])->name('get_category');
    //Admin
    Route::get('/', [CategoryController::class, 'index'])->name('category_index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category_create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category_store');

    Route::get('/unactive-category/{id}', [CategoryController::class, 'unactive_category'])->name('unactive_category');
    Route::get('/active-category/{id}', [CategoryController::class, 'active_category'])->name('active_category');

    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category_update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category_delete');
});
//Brand-Product
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandProduct::class, 'index'])->name('brand_index');
    Route::get('/create', [BrandProduct::class, 'create'])->name('brand_create');
    Route::post('/store', [BrandProduct::class, 'store'])->name('brand_store');

    Route::get('/unactive-Brand/{id}', [BrandProduct::class, 'unactive_Brand'])->name('unactive_brand');
    Route::get('/active-Brand/{id}', [BrandProduct::class, 'active_Brand'])->name('active_brand');

    Route::get('/edit/{id}', [BrandProduct::class, 'edit'])->name('brand_edit');
    Route::post('/update/{id}', [BrandProduct::class, 'update'])->name('brand_update');
    Route::get('/delete/{id}', [BrandProduct::class, 'delete'])->name('brand_delete');

});

//Product
Route::prefix('products')->group(function () {
    //danh gia sao
    Route::get('/insert-rating/{id}{rating}', [ProductController::class, 'insert_rating'])->name('insert_rating');
    //Index wishlist
    Route::get('/product/{id}', [ProductController::class, 'storeWishlist'])->name('storeWishlist');
    Route::get('/wishlist', [ProductController::class, 'showWishlist'])->name('showWishlist');
    Route::get('/wishlistDelete/{id}', [ProductController::class, 'wishlistDelete'])->name('wishlistDelete');


    //Admin
    Route::get('/', [ProductController::class, 'index'])->name('product_index');
    Route::get('/create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/store', [ProductController::class, 'store'])->name('product_store');

    Route::get('/unactive-product/{id}', [ProductController::class, 'unactive_Product'])->name('unactive_product');
    Route::get('/active-product/{id}', [ProductController::class, 'active_Product'])->name('active_product');

    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product_update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
});

//Slider
Route::prefix('slider')->group(function () {
    Route::get('/', [SliderAdminController::class, 'index'])->name('slider_index');
    Route::get('/create', [SliderAdminController::class, 'create'])->name('slider_create');
    Route::post('/store', [SliderAdminController::class, 'store'])->name('slider_store');

    Route::get('/unactive-slider/{id}', [SliderAdminController::class, 'unactive_slider'])->name('unactive_slider');
    Route::get('/active-slider/{id}', [SliderAdminController::class, 'active_slider'])->name('active_slider');

    Route::get('/edit/{id}', [SliderAdminController::class, 'edit'])->name('slider_edit');
    Route::post('/update/{id}', [SliderAdminController::class, 'update'])->name('slider_update');
    Route::get('/delete/{id}', [SliderAdminController::class, 'delete'])->name('slider_delete');
});
//Admin
Route::prefix('admins')->group(function () {
    Route::get('/all_admin', [AdminController::class, 'ShowAllAdmins'])->name('all_admin');
    Route::get('/admin_create', [AdminController::class, 'Admincreate'])->name('admin_create');
    Route::post('/post.add_admin', [AdminController::class, 'storeAdmin'])->name('post.add_admin');
    Route::get('/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin_edit');
    Route::post('/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin_update');
    Route::get('/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin_delete');
});
//Cart
Route::post('/update_cart_qty', [CartController::class, 'update_cart_qty'])->name('update_cart_qty');
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/cart', [CartController::class, 'save_cart'])->name('cart_store');
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/show_cart', [CartController::class, 'show_cart'])->name('show_cart');
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete_cart/{rowId}', [CartController::class, 'delete_cart'])->name('delete_cart');
Route::get('/delete-sp/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']);

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/del-coupon', [CouponController::class, 'del_coupon']);
//Coupon-admin
Route::get('/insert-coupon', [CouponController::class, 'insert_coupon'])->name('insert_coupon');
Route::get('/list-coupon', [CouponController::class, 'list_coupon'])->name('list_coupon');
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code'])->name('insert_coupon_code');
Route::get('/delete-coupon/{id}', [CouponController::class, 'delete_coupon'])->name('delete_coupon');

//Contact
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact_index');
    Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact_delete');
});
//Customer
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer_index');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer_delete');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer_edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer_update');
});
