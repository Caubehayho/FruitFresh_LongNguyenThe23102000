<?php

namespace App\Http\Controllers;


use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function save_cart(Request $request){

        $productId = $request->productid_hidden;
        $quantity = $request->qty;



        $title = 'Thêm giỏ hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->get();


        $data = DB::table('tbl_product')->where('product_id',$productId )->get();
        return view('pages.cart.show_cart', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home);
    }
}
