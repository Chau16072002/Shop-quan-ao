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
Route::post('/contact',[ContactController::class,'sendContact']);
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
