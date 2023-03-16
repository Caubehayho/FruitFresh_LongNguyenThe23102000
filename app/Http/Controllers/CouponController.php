<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();



class CouponController extends Controller
{
    
    public function insert_coupon(){
        $title = 'Quản lý mã giảm giá';
        return view('admin.coupon.insert-coupon', compact('title'));
    }

    //inser coupon to database
    public function insert_coupon_code(Request $request){
       $data = $request->all();

       $rules = [
        'coupon_name'=> 'required|min:6',
        'coupon_date_start'=> 'required',
        'coupon_date_end'=> 'required',
        'coupon_code'=> 'required|min:5',
        'coupon_condition'=> 'required',
        'coupon_time'=> 'required|integer',
        'coupon_number'=> 'required|integer'
        ];
        $message = [
            'coupon_name.required' => 'Tên mã giảm giá bắt buộc phải nhập',
            'coupon_name.min' => 'Tên mã giảm giá không được nhỏ hơn :min ký tự',
            'coupon_date_start.required' => 'Ngày bắt đầu bắt buộc phải nhập',
            'coupon_date_end.required' => 'Ngày bắt đầu bắt buộc phải nhập',
            'coupon_code.required' => 'Mã giảm giá bắt buộc phải nhập',
            'coupon_code.integer' => 'Mã giảm giá không được nhỏ hơn :min kí tự',
            'coupon_condition.required' => 'Bắt buộc phải chọn tính năng mã',
            'coupon_time.required' => 'Số lượng mã giảm giá bắt buộc phải nhập',
            'coupon_time.integer' => 'Số lượng mã giảm giá bắt buộc phải là số',
            'coupon_number.required' => 'Số tiền giảm giá bắt buộc phải nhập',
            'coupon_number.integer' => 'Số tiền giảm giá bắt buộc phải là số'
            
        ];
       $request->validate($rules, $message);

       $coupon = new Coupon;

       $coupon->coupon_name = $data['coupon_name'];
       $coupon->coupon_number = $data['coupon_number'];
       $coupon->coupon_code = $data['coupon_code'];
       $coupon->coupon_time = $data['coupon_time'];
       $coupon->coupon_condition = $data['coupon_condition'];
       $coupon->coupon_date_start = $data['coupon_date_start'];
       $coupon->coupon_date_end = $data['coupon_date_end'];
    //    $coupon->coupon_status = 1;

       $coupon->save();

       Session::put('message', 'Thêm mã giảm giá thành công');
       return Redirect::to('insert-coupon');
    }

    public function list_coupon(){

        $title = 'Tất cả mã giảm giá';

        $today = strtotime(Carbon::now('Asia/Ho_Chi_Minh')->format('m/d/Y'));
        $coupon = Coupon::orderby('coupon_id', 'DESC')->get();
        return view('admin.coupon.list-coupon', compact('title'))->with(compact('coupon', 'today'));
    }


    //delete coupon
    public function delete_coupon($coupon_id){
        // $coupon = Coupon::where('coupon_condition', $coupon_id)-get(); // where lấy ra cột cần so sánh để so sánh với biến truyền vào
        $coupon = Coupon::find($coupon_id); // find chỉ lấy ra id để so sánh với biến truyền vào là $coupon_id

        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');

        return Redirect::to('list-coupon');
    }


    //unset coupon
    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công');
        }
    }





}
