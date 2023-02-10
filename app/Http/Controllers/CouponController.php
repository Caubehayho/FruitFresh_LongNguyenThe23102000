<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
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

       $coupon = new Coupon;

       $coupon->coupon_name = $data['coupon_name'];
       $coupon->coupon_number = $data['coupon_number'];
       $coupon->coupon_code = $data['coupon_code'];
       $coupon->coupon_time = $data['coupon_time'];
       $coupon->coupon_condition = $data['coupon_condition'];

       $coupon->save();

       Session::put('message', 'Thêm mã giảm giá thành công');
       return Redirect::to('insert-coupon');
    }

    public function list_coupon(){

        $title = 'Tất cả mã giảm giá';
        $coupon = Coupon::orderby('coupon_id', 'DESC')->get();
        return view('admin.coupon.list-coupon', compact('title'))->with(compact('coupon'));
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
