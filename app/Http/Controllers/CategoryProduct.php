<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;

class CategoryProduct extends Controller
{


    public function add_category_product(){

        $title = 'Thêm danh mục';
        return view ('admin.add_category_product', compact('title'));
    }



    public function all_category_product(){

        $title = 'Danh sách danh mục';
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product', compact('title'))->with('ListData', $all_category_product);
        return view ('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }



    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }


    public function hide_category_product( $categoryProductId ){
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update(['category_status'=>1]);
        Session::put('message', 'Ẩn danh mục thành công');
        return Redirect::to('all-category-product');
    }


    public function show_category_product( $categoryProductId ){
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update(['category_status'=>0]);
        Session::put('message', 'Show danh mục thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product( $categoryProductId ){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $categoryProductId)->get();
        $manager_category_product = view('admin.edit_category_product')->with('ListDataEdit', $edit_category_product);
        return view ('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $categoryProductId){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }


    public function delete_category_product($categoryProductId){
        DB::table('tbl_category_product')->where('category_id', $categoryProductId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
}
