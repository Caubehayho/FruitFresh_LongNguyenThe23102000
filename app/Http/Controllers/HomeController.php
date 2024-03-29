<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;
use DB;
use App\Models\Slider;


class HomeController extends Controller
{
    public function index(Request $request){

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(6)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('slider', $slider)->with('all_post', $all_post);
    }


    //search product
    public function search(request $request){
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        $search_product = DB::table('tbl_product')->where('product_status', '1')->where('product_name', 'like', '%'.$keywords. '%')->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();


        return view('pages.sanpham.search')->with('all_post', $all_post)->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('search_product', $search_product);

    }

    //Contact-home
    public function contact(){
    
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
         //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        return view('pages.contact.contact')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
    }

    //News-home
    public function news(){
        $title = 'Tin tức';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(3)->get();

        return view('pages.news.news', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('all_post', $all_post);
    }

    public function details_new($detailsId){
        $title = 'Chi tiết bài viết';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->where('post_id', $detailsId)->orderby('post_id', 'desc')->limit(3)->get();

        return view('pages.news.details-new', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('all_post', $all_post);
    }

}
