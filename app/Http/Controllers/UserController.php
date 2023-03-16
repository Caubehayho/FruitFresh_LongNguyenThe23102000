<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Slider;
use DB;

class UserController extends Controller
{

    // admin quản lý user
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_user(){
        $title = 'Danh sách khách hàng';
        $all_user = Customer::orderBy('customer_id', 'DESC')->paginate(5);
        return view('admin.user.list_user')->with(compact('title','all_user'));
    }

    public function delete_user($user_id){
        $this->AuthLogin();
        DB::table('tbl_customer')->where('customer_id', $user_id)->delete();
        Session::put('message', 'Xóa khách hàng thành công');
        return Redirect::to('list-user');
    }

    //sửa user
    public function edit_user( $userId ){
        $this->AuthLogin();
        $title = 'Cập nhật thông tin khách hàng';
        $edit_user = DB::table('tbl_customer')->where('customer_id', $userId)->get();
        $manager_user = view('admin.user.edit_user', compact('title'))->with('ListUser', $edit_user);
        return view ('admin_layout')->with('admin.user.edit_user', $manager_user);
    }

    public function update_user(Request $request, $userId){
        $this->AuthLogin();
 
        $rules = [
            'customer_name'=> 'required',
            'customer_email'=> 'required',
            'customer_phone'=> 'required',
            'customer_address'=> 'required'
        ];
        $message = [
            'customer_name.required' => 'Tên khách hàng bắt buộc phải nhập',
            'customer_email.required' => 'Email khách hàng bắt buộc phải nhập',
            'customer_phone.required' => 'Số điện thoại khách hàng bắt buộc phải nhập',
            'customer_address.required' => 'Địa chỉ khách hàng bắt buộc phải nhập'       
        ];
        $request->validate($rules, $message);


        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_vip'] = $request->customer_vip;
        $data['customer_address'] = $request->customer_address;
        DB::table('tbl_customer')->where('customer_id', $userId)->update($data);
        Session::put('message', 'Cập nhật thông tin thành công');
        return Redirect::to('manage-user');
    }











    //Chỉnh sửa profile user
    public function show_profile( $profileId){
        $title = 'Thông tin khách hàng';
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        $user_profile = DB::table('tbl_customer')->where('customer_id', $profileId)->get();

        return view('pages.user.profile', compact('title','slider'))->with('user_profile', $user_profile);
    }


    

    public function update_profile( Request $request, $profilecusId ){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_address'] = $request->customer_address;
        // $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
       

        $get_image = $request->file('customer_img');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Profile', $new_image);
                 $data['customer_img'] = $new_image;
                 
                 DB::table('tbl_customer')->where('customer_id', $profilecusId)->update($data);
                 Session::put('message', 'Cập nhật thông tin thành công');
                 return Redirect::to('logout-checkout');
        }

        DB::table('tbl_customer')->where('customer_id', $profilecusId)->update($data);
        Session::put('message', 'Cập nhật thông tin công');
        return Redirect::to('logout-checkout');
    }
}
