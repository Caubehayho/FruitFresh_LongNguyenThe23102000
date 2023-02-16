<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
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
Route::post('/tim-kiem',[HomeController::class, "search"] );



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




//Banner
Route::get('/manage-slider', [BannerController::class, "manage_slider"]);
Route::get('/add-slider', [BannerController::class, "add_slider"]);
Route::get('/delete-slide/{slide_id}', [BannerController::class, "delete_slide"]);

Route::post('/insert-slider', [BannerController::class, "insert_slider"]);
Route::get('/unactive-slide/{slide_id}', [BannerController::class, "unactive_slide"]);
Route::get('/active-slide/{slide_id}', [BannerController::class, "active_slide"]);





//Cart
Route::post('/save-cart', [CartController::class, "save_cart"]);
Route::post('/update-cart-quantity', [CartController::class, "update_cart_quantity"]);
Route::post('/update-cart', [CartController::class, "update_cart"]);
Route::post('/add-cart-ajax', [CartController::class, "add_cart_ajax"]);
Route::get('/show-cart', [CartController::class, "show_cart"]);
Route::get('/giohang', [CartController::class, "giohang"]);
Route::get('/delete-to-cart/{rowId}', [CartController::class, "delete_to_cart"]);
Route::get('/del-product/{session_id}', [CartController::class, "del_product"]); 
Route::get('/del-all-product', [CartController::class, "del_all_product"]); 



//Coupon
Route::post('/check-coupon', [CartController::class, "check_coupon"]);
//Coupon-Admin
Route::get('/insert-coupon', [CouponController::class, "insert_coupon"]);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, "delete_coupon"]);
Route::get('/unset-coupon', [CouponController::class, "unset_coupon"]);
Route::get('/list-coupon', [CouponController::class, "list_coupon"]);
Route::post('/insert-coupon-code', [CouponController::class, "insert_coupon_code"]);


//Checkout
Route::get('/login-checkout', [CheckoutController::class, "login_checkout"]);
Route::get('/logout-checkout', [CheckoutController::class, "logout_checkout"]);
Route::post ('/add-customer', [CheckoutController::class, "add_customer"]);
Route::post ('/login-customer', [CheckoutController::class, "login_customer"]);
Route::get('/check-out', [CheckoutController::class, "check_out"]);
Route::post ('/save-checkout-customer', [CheckoutController::class, "save_checkout_customer"]);
Route::get('/payment', [CheckoutController::class, "payment"]);
Route::post('/order-place', [CheckoutController::class, "order_place"]);
// Thêm chọn phí vận chuyển ajax ::show_checkout--master
Route::post('/select-delivery-home', [CheckoutController::class, "select_delivery_home"]); 
Route::post('/caculate-fee', [CheckoutController::class, "caculate_fee"]); 
Route::get('/del-fee', [CheckoutController::class, "del_fee"]);
Route::post('/confirm-order', [CheckoutController::class, "confirm_order"]);



//order
Route::get('/manage-order', [OrderController::class, "manage_order"]);
Route::get('/view-order/{order_code}', [OrderController::class, "view_order"]);
Route::get('/print-order/{checkout_code}', [OrderController::class, "print_order"]);

Route::post('/update-order-qty', [OrderController::class, "update_order_qty"]);
Route::post('/update-qty', [OrderController::class, "update_qty"]);





//Delivery
Route::get('/delivery', [DeliveryController::class, "delivery"]);
Route::post('/select-delivery', [DeliveryController::class, "select_delivery"]);
Route::post('/insert-delivery', [DeliveryController::class, "insert_delivery"]);
Route::post('/select-feeship', [DeliveryController::class, "select_feeship"]);
Route::post('/update-delivery', [DeliveryController::class, "update_feeship"]);

//Contact us
Route::get('/contact', [HomeController::class, "contact"]);


//News
Route::get('/news', [HomeController::class, "news"]);
Route::get('/details-new', [HomeController::class, "details_new"]);


