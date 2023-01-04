<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
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
Route::get('/Trangchu', function () {
    return view('master');
})->name("Trang_chu");


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
//Brand Product-show-hide-product
Route::get('/hide-product/{ProductId}', [ProductController::class, "hide_product"]);
Route::get('/show-product/{ProductId}', [ProductController::class, "show_product"]);


