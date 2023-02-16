<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use App\Models\Slider;
use DB;

class CategoryProduct extends Controller
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


    public function add_category_product(){

        $this->AuthLogin();
        $title = 'Thêm danh mục';
        return view ('admin.add_category_product', compact('title'));
    }



    public function all_category_product(){
        
        $this->AuthLogin();
        $title = 'Danh sách danh mục';
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product', compact('title'))->with('ListData', $all_category_product);
        return view ('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }



    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
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

    public function edit_category_product( $categoryProductId ){
        $this->AuthLogin();
        $title = 'Sửa danh mục';
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $categoryProductId)->get();
        $manager_category_product = view('admin.edit_category_product', compact('title'))->with('ListDataEdit', $edit_category_product);
        return view ('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $categoryProductId){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }


    public function delete_category_product($categoryProductId){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
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
