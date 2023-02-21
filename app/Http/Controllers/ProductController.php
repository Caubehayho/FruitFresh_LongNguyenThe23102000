<?php

namespace App\Http\Controllers;


use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;

class ProductController extends Controller
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





    public function add_product(){
        $this->AuthLogin();
        $title = 'Thêm sản phẩm';
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        return view ('admin.add_product', compact('title'))->with('cate_product', $cate_product)->with('brand_product', $brand_product);


    }



    public function all_product(){

        $this->AuthLogin();
        $title = 'Tất cả sản phẩm';
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product', compact('title'))->with('ListData', $all_product);
        return view ('admin_layout')->with('admin.all_product', $manager_product);
    }



    public function save_product(Request $request){
        $this->AuthLogin();
        $rules = [
            'product_name'=> 'required|min:6',
            'product_price'=> 'required|integer',
            'product_quantity'=> 'required|integer'
        ];
        $message = [
            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
            'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'product_price.integer' => 'Giá sản phẩm bắt buộc phải là số',
            'product_quantity.required' => 'Sos lượng sản phẩm bắt buộc phải nhập',
            'product_quantity.integer' => 'Sos lượng sản phẩm bắt buộc phải là số'
        ];
        $request->validate($rules, $message);

        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_type'] = $request->product_type;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Product', $new_image);
                 $data['product_image'] = $new_image;
                  DB::table('tbl_product')->insert($data);
                 Session::put('message', 'Thêm sản phẩm thành công');
                 return Redirect::to('add-product');
        }
        $data['product_image'] = '';

        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');

        return Redirect::to('all-product');
    }


    public function hide_product( $ProductId ){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $ProductId)->update(['product_status'=>1]);
        Session::put('message', 'Show sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function show_product( $ProductId ){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $ProductId)->update(['product_status'=>0]);
        Session::put('message', 'Ẩn sản phẩm thành công');
        return Redirect::to('all-product');
    }



    public function edit_product( $ProductId ){
        $this->AuthLogin();
        $title = 'Sửa sản phẩm';
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $ProductId)->get();
        $manager_product = view('admin.edit_product', compact('title'))->with('ListDataEditProduct', $edit_product)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        return view ('admin_layout')->with('admin.edit_product', $manager_product);
    }



    public function update_product(Request $request, $ProductId){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_type'] = $request->product_type;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
                 $get_name_image = $get_image->getClientOriginalName();
                 $name_image_ori = current(explode('.', $get_name_image));
                 $new_image =  $name_image_ori.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
                 $get_image->move('Up_Load/Product', $new_image);
                 $data['product_image'] = $new_image;
                  DB::table('tbl_product')->where('product_id', $ProductId)->update($data);
                 Session::put('message', 'Cập nhật sản phẩm thành công');
                 return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id', $ProductId)->update($data);
        Session::put('message', 'Cập nhật phẩm thành công');
        return Redirect::to('all-product');
    }




    public function delete_product($ProductId){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $ProductId)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //End Admin pages



    public function details_product($product_id, Request $request){
        //seo
        $url_canonical= $request->url();
        //seo

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id', $product_id )->get();


        //San pham lien quan
        foreach($details_product as $value)
        {
            $category_id = $value->category_id;
        }

        //lấy ra tất cả sản phẩm có category_id == sản phẩm đang xem cho tiết
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id', $category_id )->whereNotIn('tbl_product.product_id', [$product_id] )->limit(3)->get();

        return view('pages.sanpham.show_detail')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('product_details' , $details_product )->with('relate', $related_product )->with('url_canonical', $url_canonical);
    }



}
