<?php

namespace App\Http\Controllers;


use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\Comment;

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


    // Xoa comment
    public function delete_comment( $CommentId ){
        $this->AuthLogin();
        DB::table('tbl_comment')->where('comment_id', $CommentId)->delete();
        Session::put('message', 'Xóa bình luận thành công');
        return Redirect::to('/comment');
    }
 
    //Trả lời comment
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'MinhTrangFruit';
        $comment->save();
    }


    // Duyệt comment
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }



    //Quản lý comment- admin
    public function list_comment(){
        $title ='Quản lý bình luận';
        $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id', 'DESC')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        return view('admin.comment.list-comment', compact('title'))->with('comment', $comment)->with('comment_rep', $comment_rep);
    }




    //Comment send
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment_customer_img = $request->comment_customer_img;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->comment_customer_img =  $comment_customer_img;
        $comment->save();
    }




    //Comment load hiển thị
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id', $product_id)->where('comment_parent_comment','=',0)->where('comment_status', 0)->orderBy('comment_id', 'DESC')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();

        $output = '';
        foreach($comment as $key => $comm){
          
            $output.= '

                        <div class="row style_comment" style="margin-bottom: 25px">
                            <div class="col-md-2">
                            
                                <img style="width: 80%" src="'.url('/Up_Load/Profile/'.$comm->comment_customer_img).'" alt="photo">
                            </div>
                            <div class="col-md-10">
                                <p style="color: #44a41b; margin-bottom: 0">@'.$comm->comment_name.'</p>
                                <p style="color: #44a41b">'.$comm->comment_date.'</p>
                                <p>
                                '.$comm->comment.'
                                </p>
                            </div>
                        </div>
                        ';

            foreach($comment_rep as $rep_comment){
            if($rep_comment->comment_parent_comment==$comm->comment_id){
                $output.= '<div class="row style_comment" style="margin: 5px 40px; margin-right: 0;  background-color: #44a41b">
                                <div class="col-md-2">
                                
                                    <img style="width: 80%" src="'.url('/Up_Load/Profile/reply.jpeg').'" alt="photo">
                                </div>
                                <div class="col-md-10">
                                    <p style="color: white; margin-bottom: 0">@'.$rep_comment->comment_name.'</p>
                                    <p style="color: white">'.$rep_comment->comment.'</p>
                                    <p>
                                    
                                    </p>
                                </div>
                          </div>     
                        <p></p>';
                }}



            
        }
        echo $output;
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
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->paginate(5);
        $manager_product = view('admin.all_product', compact('title', 'all_product'))->with('ListData', $all_product);
        return view ('admin_layout')->with('admin.all_product', $manager_product);
    }



    public function save_product(Request $request){
        $this->AuthLogin();
        $rules = [
            'product_name'=> 'required|min:6',
            'product_price'=> 'required|integer',
            'product_quantity'=> 'required|integer',
            'product_image'=> 'required'
        ];
        $message = [
            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
            'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'product_price.integer' => 'Giá sản phẩm bắt buộc phải là số',
            'product_quantity.required' => 'Số lượng sản phẩm bắt buộc phải nhập',
            'product_quantity.integer' => 'Số lượng sản phẩm bắt buộc phải là số',
            'product_image.required' => 'Hình ảnh sản phẩm bắt buộc phải chọn'
        ];
        $request->validate($rules, $message);

        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_sold'] = 0;
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
        $data['product_sold'] = $request->product_sold;
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
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(3)->get();

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

        return view('pages.sanpham.show_detail')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider)->with('product_details' , $details_product )->with('all_post', $all_post)->with('relate', $related_product )->with('url_canonical', $url_canonical);
    }



}
