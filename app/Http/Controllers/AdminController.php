<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Post;
use App\Models\Order;
use App\Models\Customer;

class AdminController extends Controller
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


    //Hiện thị view login
    public function index(){
        return view('admin_login');
    }


     // Post yêu cầu đăng nhập
     public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
       

        if($result){
            Session::put('admin_name', $result->admin_name);         
            Session::put('admin_id', $result->admin_id);
            return Redirect('/dashboard');
        }
        else{
            Session::put('message', ' Thong tin khong chinh xac!');
            return Redirect::to('/admin');
        }
        }


    //Hiển thị dashboard admin
    public function show_dashboard(){
        $this->AuthLogin();
        $title = ' Bảng điều khiển ';
        $product = Product::all()->count();
        $post = Post::all()->count();
        $order = Order::all()->count();
        $customer = Customer::all()->count(); 
        // dd($result);      
        
        
        return view('admin.dashboard', compact('title', 'product', 'post', 'order', 'customer'));
    }


   


        //Đăng xuất tài khoản
        public function logout(){
            $this->AuthLogin();
            Session::put('admin_name', null);
            Session::put('admin_id', null);
            return Redirect::to('admin');
        }
    }
