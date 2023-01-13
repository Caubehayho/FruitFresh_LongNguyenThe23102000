<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;


class CheckoutController extends Controller
{
    public function login_checkout() {
        
        $title = 'Đăng nhập mua hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();



        return view ('pages.checkout.login_checkout', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home);
    }



    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/check-out');
    }


    public function check_out(){
        $title = 'Checkout mua hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();



        return view ('pages.checkout.show_checkout', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home);
    }


    public function save_checkout_customer(Request $request){

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }


    public function payment(){
        $title = 'Thanh toán giỏ hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();



        return view ('pages.checkout.payment', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home);
    }


    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }



    public function login_customer(Request $request){

        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();
        if($result){
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/check-out');
        }
        else{
            return Redirect::to('/login-checkout');
        }
        

        

    }

}



