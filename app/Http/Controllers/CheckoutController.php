<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use Illuminate\Http\Request;
use DB;


class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }


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

    

    public function order_place(Request $request){
        //get payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang đợi xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);


        //inser_order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang đợi xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //inder_order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data ['order_id'] = $order_id;
            $order_d_data ['product_id'] = $v_content->id;
            $order_d_data ['product_name'] = $v_content->name;
            $order_d_data ['product_price'] = $v_content->price;
            $order_d_data ['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data );
       }
       if($data['payment_method']==1){
        echo'Thanh  toán bằng rth ATM';
       }
       elseif($data['payment_method']==2){
        Cart::destroy();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->limit(4)->get();



        return view ('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home);
       }
       else
       echo ' Thẻ ghi nợ';

        // return Redirect::to('/payment');
        
        
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



    public function manage_order(){
        $this->AuthLogin();
        $title = 'Tất cả đơn hàng';
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.manage_order', compact('title'))->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }


    public function view_order($orderId){
        $this->AuthLogin();
        $title = 'Chi tiết đơn hàng';
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_details.*')->first();

        $manager_order_by_id = view('admin.view_order', compact('title'))->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        // return view('admin.view_order',compact('title'));
    }



}



