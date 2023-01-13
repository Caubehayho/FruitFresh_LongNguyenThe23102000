<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    public function index(){

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(3)->get();

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home)->with('all_product', $all_product);
    }


    //search product
    public function search(request $request){
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();

        $search_product = DB::table('tbl_product')->where('product_status', '1')->where('product_name', 'like', '%'.$keywords. '%')->get();


        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home)->with('search_product', $search_product);

    }

}
