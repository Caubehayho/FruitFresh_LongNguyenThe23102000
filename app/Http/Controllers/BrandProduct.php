<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;

class BrandProduct extends Controller
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

    
    public function add_brand_product(){
        $this->AuthLogin();
        $title = 'Thêm thương hiệu sản phẩm';
        return view ('admin.add_brand_product', compact('title'));
    }



    public function all_brand_product(){
        $this->AuthLogin();
        $title = 'Tất cả thương hiệu';
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.all_brand_product', compact('title'))->with('ListData', $all_brand_product);
        return view ('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }



    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        
        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu thành công');
        return Redirect::to('add-brand-product');
    }


    public function hide_brand_product( $BrandProductId ){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update(['brand_status'=>1]);
        Session::put('message', 'Show thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }


    public function show_brand_product( $BrandProductId ){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update(['brand_status'=>0]);
        Session::put('message', 'Ẩn thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product( $BrandProductId ){
        $this->AuthLogin();
        $title = 'Sửa thương hiệu';
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $BrandProductId)->get();
        $manager_brand_product = view('admin.edit_brand_product', compact('title'))->with('ListDataEdit', $edit_brand_product);
        return view ('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request, $BrandProductId){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update($data);
        Session::put('message', 'Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }


    public function delete_brand_product($BrandProductId){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->delete();
        Session::put('message', 'Xóa thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
      //End Function Admin Page










    public function show_brand_home($brand_id){

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slide_home = DB::table('tbl_slide')->where('slide_status', '1')->orderby('slide_id', 'desc')->get();

        //lấy ra danh mục có id trùng category_id từ 2 bảng thỏa mãn status
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')->where('tbl_product.product_status', '1')->where('tbl_product.brand_id', $brand_id)->get();

         //lấy tên danh mục làm tiêu đề
         $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id )->limit(1)->get();
       

        return view('pages.brand.show_brand')->with('category', $cate_product)->with('brand', $brand_product)->with('slide', $slide_home)->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name);
    }
}
