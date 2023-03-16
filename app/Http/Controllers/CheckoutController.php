<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use Illuminate\Http\Request;
use DB;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Coupon;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Slider;


class CheckoutController extends Controller
{

    public function confirm_order(Request $request){
        $data = $request->all(); 

        //lấy coupon để trừ số lượng mã giảm khi khách xác nhận đơn hàng
        if(Session::get('coupon')){
            $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon->save();
        }
        else{}
      
        // lấy vận chuyển
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;


        $checkout_code = substr(md5(microtime()), rand(0, 26),5);

        //lấy order
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();   


        if(Session::get('cart')){
            foreach(Session::get('cart') as $key =>$cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code; //lấy thông tin từ bảng order qua order-detail thông qua $checkout_code
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save(); 
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }



    public function del_fee(){
        Session::forget('fee');
        return Redirect()->back();
    }


    public function caculate_fee(Request $request){
        $data = $request->all(); 
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();

            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key =>$fee){
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                }
                else{
                    Session::put('fee', 15000);
                    Session::save();
                }
            }
        }
    }


    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
            foreach($select_province as $key =>$province){
                $output.= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
            }
        }
        else{
            $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid', 'ASC')->get();
                 $output.='<option>---Chọn xã phường---</option>';
            foreach($select_wards as $key =>$ward){
                $output.= '<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            }

        }   
           
        }
        echo $output;
    }


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

        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(3)->get();



        return view ('pages.checkout.login_checkout', compact('title'))->with('all_post', $all_post)->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
    }



    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = '';
        $data['customer_img'] = $request->customer_default_avatar;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);
        $customer_name = DB::table('tbl_customer')->get('customer_name');

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer_name);
    
        return Redirect::to('/login-checkout');
    }


    public function check_out(){
        $title = 'Checkout mua hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();

        $city = City::orderby('matp', 'ASC')->get();



        return view ('pages.checkout.show_checkout', compact('title'))->with('all_post', $all_post)->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('city', $city);
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

        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();



        return view ('pages.checkout.payment', compact('title'))->with('all_post', $all_post)->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
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

        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();



        return view ('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
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
        if(Session::get('coupon')==true){
            Session::forget('coupon');
        }

        if($result){
            $customer_name = $result->customer_name;
            $resultt = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();
            $customer_img = $result->customer_img;
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $customer_name);
            Session::put('customer_img', $customer_img);
            return Redirect::to('/check-out');
        }
        else{
            return redirect('login-checkout')->with('error', 'Thông tin tài khoản sai, vui lòng đăng nhập lại');
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



