<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;

class SlideController extends Controller
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


    
    public function add_slide(){
        $this->AuthLogin();
        $title = 'Thêm slide';
        // $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        return view ('admin.add_slide', compact('title'));
    }



    public function all_slide(){

        $this->AuthLogin();
        $title = 'Tất cả slide';
        $all_slide = DB::table('tbl_slide')->get();
        $manager_slide = view('admin.all_slide', compact('title'))->with('ListDataSlide', $all_slide);
        return view ('admin_layout')->with('admin.all_slide', $manager_slide);
    }



    public function save_slide(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['slide_name'] = $request->slide_name;
        $data['slide_desc'] = $request->slide_desc;
        $data['slide_content'] = $request->slide_content;
        $data['slide_status'] = $request->slide_status;

        $get_image = $request->file('slide_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Slide', $new_image);
                 $data['slide_image'] = $new_image;
                  DB::table('tbl_slide')->insert($data);
                 Session::put('message', 'Thêm slide thành công');
                 return Redirect::to('all-slide');
        }
        $data['slide_image'] = '';

        DB::table('tbl_slide')->insert($data);
        Session::put('message', 'Thêm slide thành công');
        return Redirect::to('add-slide');
    }


    public function hide_slide( $SlideId ){
        $this->AuthLogin();
        DB::table('tbl_slide')->where('slide_id', $SlideId)->update(['slide_status'=>1]);
        Session::put('message', 'Show slide thành công');
        return Redirect::to('all-slide');
    }
    public function show_slide( $SlideId ){
        $this->AuthLogin();
        DB::table('tbl_slide')->where('slide_id', $SlideId)->update(['slide_status'=>0]);
        Session::put('message', 'Ẩn slide thành công');
        return Redirect::to('all-slide');
    }



    public function edit_slide( $SlideId ){
        $this->AuthLogin();
        $title = 'Sửa slide';

        $edit_slide = DB::table('tbl_slide')->where('slide_id', $SlideId)->get();
        $manager_slide = view('admin.edit_slide', compact('title'))->with('ListDataEditSlide', $edit_slide);
        return view ('admin_layout')->with('admin.edit_slide', $manager_slide);
    }



    public function update_slide(Request $request, $SlideId){
        $this->AuthLogin();
        $data = array();
        $data['slide_name'] = $request->slide_name;
        $data['slide_desc'] = $request->slide_desc;
        $data['slide_content'] = $request->slide_content;
        $data['slide_status'] = $request->slide_status;

        $get_image = $request->file('slide_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Slide', $new_image);
                 $data['slide_image'] = $new_image;
                  DB::table('tbl_slide')->where('slide_id', $SlideId)->update($data);
                 Session::put('message', 'Cập nhật slide thành công');
                 return Redirect::to('all-slide');
        }

        DB::table('tbl_slide')->where('slide_id', $SlideId)->update($data);
        Session::put('message', 'Cập nhật slide thành công');
        return Redirect::to('all-slide');
    }




    public function delete_slide($SlideId){
        $this->AuthLogin();
        DB::table('tbl_slide')->where('slide_id', $SlideId)->delete();
        Session::put('message', 'Xóa slide thành công');
        return Redirect::to('all-slide');
    }
}
