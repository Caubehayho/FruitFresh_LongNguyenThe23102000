<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use Session;
use DB;

class BannerController extends Controller
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





    public function manage_slider(){
        $title = 'Tất cả slide';
        $all_slide = Slider::orderBy('slider_id', 'DESC')->paginate(3);
        return view('admin.slider.list_slider')->with(compact('title','all_slide'));
    }



    public function add_slider(){
        $title = 'Thêm slide';

        return view('admin.slider.add_slider')->with(compact('title'));
    }


    public function insert_slider(Request $request){
        $data = $request->all();
        $this->AuthLogin();

        $rules = [
            'slider_name'=> 'required',
            'slider_image'=> 'required',
            'slider_des'=> 'required',
            'slider_content'=> 'required'
        ];
        $message = [
            'slider_name.required' => 'Tên slide bắt buộc phải nhập',
            'slider_image.required' => 'Hình ảnh slide bắt buộc phải nhập',
            'slider_des.required' => 'Mô tả slide bắt buộc phải nhập',
            'slider_content.required' => 'Nội dung bắt buộc phải nhập',             
        ];
        $request->validate($rules, $message);


        $get_image = $request->file('slider_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image)); //Phan tách đầu cuối, dấu chấm ở giữa
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 
                 $get_image->move('Up_Load/Slide', $new_image);

        $slider = new Slider();
        $slider->slider_name = $data['slider_name'];
        $slider->slider_image = $new_image;
        $slider->slider_status = $data['slider_status'];
        $slider->slider_des = $data['slider_des'];
        $slider->slider_content = $data['slider_content'];
        $slider->save();

        Session::put('message', 'Thêm slide thành công');
        return Redirect::to('add-slider');
        }
        else{
            Session::put('message', 'Làm ơn thêm ảnh');
            return Redirect::to('add-slider');
        }
   
    }


    public function unactive_slide( $slide_id ){
        $this->AuthLogin();
        DB::table('tbl_banner')->where('slider_id', $slide_id)->update(['slider_status'=>1]);
        Session::put('message', 'Show slide thành công');
        return Redirect::to('manage-slider');
    }


    public function active_slide( $slide_id ){
        $this->AuthLogin();
        DB::table('tbl_banner')->where('slider_id', $slide_id)->update(['slider_status'=>0]);
        Session::put('message', 'Ẩn slide thành công');
        return Redirect::to('manage-slider');
    }



    //delete-slide
    public function delete_slide( $slide_id ){
        $this->AuthLogin();
        DB::table('tbl_banner')->where('slider_id', $slide_id)->delete();
        Session::put('message', 'Xóa slide thành công');
        return Redirect::to('manage-slider');
    }

}
