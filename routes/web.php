<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CartController;
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

//FrontEnd
Route::get('/',[HomeController::class, "index"] );
Route::get('/Trangchu',[HomeController::class, "index"] );



//Danh muc san pham trang chu
Route::get('/danh-muc-hoa-qua/{category_id}', [CategoryProduct::class, "show_category_home"]);
//Thuong hieu san pham trang chu
Route::get('/thuong-hieu-hoa-qua/{brand_id}', [BrandProduct::class, "show_brand_home"]);
//Chi tiet san pham trang chu
Route::get('/chi-tiet-hoa-qua/{product_id}', [ProductController::class, "details_product"]);



//BackEnd
Route::get('/admin', [AdminController::class, "index"]);
Route::get('/dashboard', [AdminController::class, "show_dashboard"]);

Route::post('/admin_dashboard', [AdminController::class, "dashboard"]);
Route::get('/logout', [AdminController::class, "logout"])->name("Admin.SignOut");



//Category Product
Route::get('/add-category-product', [CategoryProduct::class, "add_category_product"])->name("category_product_addfruit");
Route::get('/edit-category-product/{categoryProductId}', [CategoryProduct::class, "edit_category_product"]);
Route::get('/delete-category-product/{categoryProductId}', [CategoryProduct::class, "delete_category_product"]);
Route::get('/all-category-product', [CategoryProduct::class, "all_category_product"])->name("category_product_listfruit");

Route::post('/save-category-product', [CategoryProduct::class, "save_category_product"]);
Route::post('/update-category-product/{categoryProductId}', [CategoryProduct::class, "update_category_product"]);
//Category Product-show-hide-product
Route::get('/hide-category-fruit/{categoryProductId}', [CategoryProduct::class, "hide_category_product"]);
Route::get('/show-category-fruit/{categoryProductId}', [CategoryProduct::class, "show_category_product"]);



//Brand Product
Route::get('/add-brand-product', [BrandProduct::class, "add_brand_product"])->name("product_addbrand");
Route::get('/edit-brand-product/{BrandProductId}', [BrandProduct::class, "edit_brand_product"]);
Route::get('/delete-brand-product/{BrandProductId}', [BrandProduct::class, "delete_brand_product"]);
Route::get('/all-brand-product', [BrandProduct::class, "all_brand_product"])->name("product_listbrand");

Route::post('/save-brand-product', [BrandProduct::class, "save_brand_product"]);
Route::post('/update-brand-product/{BrandProductId}', [BrandProduct::class, "update_brand_product"]);
//Brand Product-show-hide-product
Route::get('/hide-brand-fruit/{BrandProductId}', [BrandProduct::class, "hide_brand_product"]);
Route::get('/show-brand-fruit/{BrandProductId}', [BrandProduct::class, "show_brand_product"]);





//Product
Route::get('/add-product', [ProductController::class, "add_product"])->name("product_add");
Route::get('/edit-product/{ProductId}', [ProductController::class, "edit_product"]);
Route::get('/delete-product/{ProductId}', [ProductController::class, "delete_product"]);
Route::get('/all-product', [ProductController::class, "all_product"])->name("product_list");

Route::post('/save-product', [ProductController::class, "save_product"]);
Route::post('/update-product/{ProductId}', [ProductController::class, "update_product"]);
// Product-show-hide-product
Route::get('/hide-product/{ProductId}', [ProductController::class, "hide_product"]);
Route::get('/show-product/{ProductId}', [ProductController::class, "show_product"]);




//Slide
Route::get('/add-slide', [SlideController::class, "add_slide"])->name("slide_add");
Route::get('/edit-slide/{SlideId}', [SlideController::class, "edit_slide"]);
Route::get('/delete-slide/{SlideId}', [SlideController::class, "delete_slide"]);
Route::get('/all-slide', [SlideController::class, "all_slide"])->name("slide_list");

Route::post('/save-slide', [SlideController::class, "save_slide"]);
Route::post('/update-slide/{SlidetId}', [SlideController::class, "update_slide"]);
//Show-hide-slide
Route::get('/hide-slide/{SlideId}', [SlideController::class, "hide_slide"]);
Route::get('/show-slide/{SlideId}', [SlideController::class, "show_slide"]);





//Cart
Route::post('/save-cart', [CartController::class, "save_cart"]);
Route::post('/update-cart-quantity', [CartController::class, "update_cart_quantity"]);
Route::get('/show-cart', [CartController::class, "show_cart"]);
Route::get('/delete-to-cart/{rowId}', [CartController::class, "delete_to_cart"]);

