<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Redirect;
session_start();

use App\Models\Slider;
use DB;

class PostController extends Controller
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


    public function add_post(){

        $this->AuthLogin();
        $title = 'Thêm bài viết';
        return view ('admin.post.add_post', compact('title'));
    }



   
    public function all_post(){

        $this->AuthLogin();
        $title = 'Tất cả bài viết';
        $all_post = DB::table('tbl_post')->paginate(3);
        $manager_post = view('admin.post.all_post', compact('title'))->with('ListPost', $all_post);
        return view ('admin_layout')->with('admin.post.all_post', $manager_post);
    }



    public function save_post(Request $request){
        $this->AuthLogin();
        $rules = [
            'post_name'=> 'required|min:10',
            'post_des'=> 'required|min:25',
            'post_image'=> 'required'
        ];
        $message = [
            'post_name.required' => 'Tên bài viết bắt buộc phải nhập',
            'post_name.min' => 'Tên bài viết không được nhỏ hơn :min ký tự',
            'post_des.required' => 'Tên bài viết bắt buộc phải nhập',
            'post_des.min' => 'Tên bài viết không được nhỏ hơn :min ký tự',
            'post_image.required' => 'Hình ảnh bài viết bắt buộc phải chọn'
            
        ];
        $request->validate($rules, $message);

        
        $data = array();
        $data['post_name'] = $request->post_name;
        $data['post_des'] = $request->post_des;
        $data['post_status'] = $request->post_status;

        $get_image = $request->file('post_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Post', $new_image);
                 $data['post_image'] = $new_image;
                  DB::table('tbl_post')->insert($data);
                 Session::put('message', 'Thêm bài viết thành công');
                 return Redirect::to('add-post');
        }
        $data['post_image'] = '';

        DB::table('tbl_post')->insert($data);
        Session::put('message', 'Thêm bài viết thành công');

        return Redirect::to('all-post');
    }


    public function hide_category_product( $categoryProductId ){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update(['category_status'=>1]);
        Session::put('message', 'Show danh mục thành công');
        return Redirect::to('all-category-product');
    }


    public function show_category_product( $categoryProductId ){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update(['category_status'=>0]);
        Session::put('message', 'Ẩn danh mục thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_post( $PostId ){
        $this->AuthLogin();
        $title = 'Sửa bài viết';

        $edit_post = DB::table('tbl_post')->where('post_id', $PostId)->get();
        $manager_post = view('admin.post.edit_post', compact('title'))->with('ListDataEditPost', $edit_post);
        return view ('admin_layout')->with('admin.post.edit_post', $manager_post);
    }

    public function update_post(Request $request, $PostId){
        $this->AuthLogin();
        $data = array();
        $data['post_name'] = $request->post_name;
        $data['post_des'] = $request->post_des;
        $data['post_status'] = $request->post_status;

        $get_image = $request->file('post_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Post', $new_image);
                 $data['post_image'] = $new_image;
                  DB::table('tbl_post')->where('post_id', $PostId)->update($data);
                 Session::put('message', 'Cập nhật bài viết thành công');
                 return Redirect::to('all-post');
        }

        DB::table('tbl_post')->where('post_id', $PostId)->update($data);
        Session::put('message', 'Cập nhật bài viết thành công');
        return Redirect::to('all-post');
    }


    public function hide_post( $PostId ){
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $PostId)->update(['post_status'=>1]);
        Session::put('message', 'Show bài viết thành công');
        return Redirect::to('all-post');
    }
    public function show_post( $PostId ){
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $PostId)->update(['post_status'=>0]);
        Session::put('message', 'Ẩn bài viết thành công');
        return Redirect::to('all-post');
    }


    public function delete_post($PostId){
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $PostId)->delete();
        Session::put('message', 'Xóa bài viết thành công');
        return Redirect::to('all-post');
    }
    
    //End Function Admin Page







    public function show_category_home($category_id){

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
         //Slider
         $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        //lấy ra sản phẩm có id trùng category_id từ 2 bảng thỏa mãn status
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.product_status', '1')->where('tbl_product.category_id', $category_id)->get();

         //lấy tên danh mục làm tiêu đề
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id )->limit(1)->get();

        return view('pages.category.show_category')->with('category', $cate_product)->with('brand', $brand_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name)->with('slider', $slider);
    }

}
