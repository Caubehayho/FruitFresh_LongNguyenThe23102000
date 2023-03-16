<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use DB;
use App\Models\Slider;
use App\Models\Coupon;
use App\Models\Customer;
use Carbon\Carbon;
 

class MailController extends Controller
{

    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer  = Customer::where('customer_email', '=', $data['email'])->where('customer_token', '=', $data['token'])->get();
        $count = $customer->count();

        if($count>0){
            foreach($customer as $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['password_account']);
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('login-checkout')->with('message', 'Cập nhật mật khẩu thành công, vui lòng đăng nhập để mua hàng');
        }
        else{
            return redirect('quen-mat-khau')->with('error', 'Vui lòng nhập lại email vì link đã quá hạn');
        }
    }

    public function update_new_pass(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(6)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();

        return view('pages.checkout.new_pass')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('slider', $slider)->with('all_post', $all_post);
    }



    public function recover_pass(Request $request){
        $data = $request->all();

 
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu MinhTrangFruit".' '.$now;

        $customer  = Customer::where('customer_email', '=', $data['email_account'])->get();
        foreach($customer as $value){
            $customer_id = $value->customer_id;
        }

        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error', ' Email chưa được đăng kí để khôi phục lại mật khẩu');
            }
            else{
                $token_random = Str::random();
                $customer = Customer::find( $customer_id );
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

                $data = array("name"=>$title_mail, "body"=>$link_reset_pass, 'email'=>$data['email_account']);

                Mail::send('pages.checkout.forget_pass_notify', ['data'=> $data], function($message) use ($title_mail, $data){
                    $message->to($data['email'])->subject($title_mail); // send this mail with subject
                    $message->from($data['email'], $title_mail); // send this mail with subject
            });
            return redirect()->back()->with('message', 'Gửi mail thành công, vui lòng vào mail để reset mật khẩu');
            }
        }



        
      
    }




    public function quen_mat_khau(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        //Slider
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(6)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();

        return view('pages.checkout.forget_pass')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('slider', $slider)->with('all_post', $all_post);
    }














    
    public function send_coupon_vip( $coupon_time, $coupon_condition, $coupon_number, $coupon_code ){
        $customer_vip = Customer::where('customer_vip', 1)->get();
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
        $start_coupon = $coupon->coupon_date_start;
        $end_coupon = $coupon->coupon_date_end;


        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi ngày".' '.$now;

        $data = [];
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        $coupon = array(
            'start_coupon' => $start_coupon,
            'end_coupon' => $end_coupon,
            'coupon_time' => $coupon_time,
            'coupon_condition' => $coupon_condition,
            'coupon_number' => $coupon_number,
            'coupon_code' => $coupon_code
        );


        Mail::send('pages.send_coupon_vip', ['coupon' => $coupon], function($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail); // send this mail with subject
                $message->from($data['email'], $title_mail); // send this mail with subject

        });

        return redirect()->back()->with('message', 'Gửi mã khuyến mãi tới khách hàng vip thành công ');
    }


     
    public function send_coupon( $coupon_time, $coupon_condition, $coupon_number, $coupon_code ){
        $customer = Customer::where('customer_vip',Null)->get();
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
        $start_coupon = $coupon->coupon_date_start;
        $end_coupon = $coupon->coupon_date_end;


        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi ngày".' '.$now;

        $data = [];
        foreach($customer as $normal){
            $data['email'][] = $normal->customer_email;
        }
        $coupon = array(
            'start_coupon' => $start_coupon,
            'end_coupon' => $end_coupon,
            'coupon_time' => $coupon_time,
            'coupon_condition' => $coupon_condition,
            'coupon_number' => $coupon_number,
            'coupon_code' => $coupon_code
        );


        Mail::send('pages.send_coupon', ['coupon' => $coupon], function($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail); // send this mail with subject
                $message->from($data['email'], $title_mail); // send this mail with subject

        });

        return redirect()->back()->with('message', 'Gửi mã khuyến mãi tới khách hàng thường thành công ');
    }





    public function mail_example(){
        return view('pages.send_coupon');
    }
}
