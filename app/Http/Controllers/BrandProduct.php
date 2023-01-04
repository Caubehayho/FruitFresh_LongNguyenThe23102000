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
    
    public function add_brand_product(){
        $title = 'Thêm thương hiệu sản phẩm';
        return view ('admin.add_brand_product', compact('title'));
    }



    public function all_brand_product(){

        $title = 'Tất cả thương hiệu';
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.all_brand_product', compact('title'))->with('ListData', $all_brand_product);
        return view ('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }



    public function save_brand_product(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        
        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu thành công');
        return Redirect::to('add-brand-product');
    }


    public function hide_brand_product( $BrandProductId ){
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update(['brand_status'=>1]);
        Session::put('message', 'Show thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }


    public function show_brand_product( $BrandProductId ){
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update(['brand_status'=>0]);
        Session::put('message', 'Ẩn thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product( $BrandProductId ){
        $title = 'Sửa thương hiệu';
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $BrandProductId)->get();
        $manager_brand_product = view('admin.edit_brand_product', compact('title'))->with('ListDataEdit', $edit_brand_product);
        return view ('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request, $BrandProductId){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->update($data);
        Session::put('message', 'Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }


    public function delete_brand_product($BrandProductId){
        DB::table('tbl_brand')->where('brand_id', $BrandProductId)->delete();
        Session::put('message', 'Xóa thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
}
