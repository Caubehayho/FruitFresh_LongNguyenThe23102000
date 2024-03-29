<?php

namespace App\Http\Controllers;


use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Slider;
use DB;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        //Lấy tất cả thông tin dựa vào id được lấy ra hiện tại
        $product_info = DB::table('tbl_product')->where('product_id',$productId )->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        // Cart::destroy();

        return Redirect::to('/show-cart');
        
    }


    public function show_cart(){
        $title = 'Thêm giỏ hàng';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();

        return view('pages.cart.show_cart', compact('title'))->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
    }



    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }




    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);

        return Redirect::to('/show-cart');
    }


    //add cart ajax
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        // print_r($data);
        $session_id = substr(md5(microtime()), rand(0, 26),5); //mỗi sản phẩm thêm vào sẽ tạo ra 1 sectionId riêng, khi xóa sẽ dựa vào sectionId này
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if ($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                    $cart[$key]['product_qty']+=1;
                    Session::put('cart',$cart);
                }
            }
            if ($is_avaiable == 0 ){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_image' =>$data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price']
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_image' =>$data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price']
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    //Gio hang ajax
    public function giohang(){
        $title = 'Thêm giỏ hàng ajax';
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(5)->get();
        $all_post = DB::table('tbl_post')->where('post_status', '1')->orderby('post_id', 'desc')->limit(6)->get();

        return view('pages.cart.cart_ajax', compact('title'))->with('all_post', $all_post)->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider);
    }

    //delete-ajax
    public function del_product($session_id){
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if($cart==true){
            foreach( $cart as $key => $val){   //key la gia tri id tu 0, 1 , 2, 3, 4, ...
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message', 'Xóa sản phẩm thất bại');
        }
    }

    //update-cart-ajax
    public function update_cart( Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){ //$key là sessionId của sản phẩm , qty là só lượng
                foreach($cart as $session =>$val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật số lượng thành công');
        }else{
            return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
        }
    }

    //delete-all-product 
    public function del_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa giỏ hàng thành công');
        }
    }


    //Check-Coupon

    public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('m/d/Y');
        $data = $request->all();

        if(Session::get('customer_id')){
            
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=', $today)
            ->where('coupon_used','LIKE', '%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return redirect()->back()->with('error', ' Mã giảm giá đã sử dụng, vui lòng nhập mã khác');
            }
            else{
                $coupon_login = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=', $today)
                ->first();
                if($coupon_login){
                    $count_coupon = $coupon_login->count();
                    if($count_coupon>0){
                        $coupon_session = Session::get('coupon');
                        if($coupon_session==true){
                            $is_avaiable = 0;
                            if($is_avaiable==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
                                );
        
                                Session::put('coupon', $cou);
                            }
                        }
                        else{
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,
                            );
        
                            Session::put('coupon', $cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message', ' Thêm mã giảm giá thành công');
                    }
                }else{
                    return redirect()->back()->with('error', ' Mã giảm giá không đúng hoặc đã hết hạn');
                }
            }
        }
        else{
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=', $today)
            ->first();
            // $coupon_date_end = strtotime($coupon->coupon_date_end);
            // $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,
                            );
    
                            Session::put('coupon', $cou);
                        }
                    }
                    else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
    
                        Session::put('coupon', $cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message', ' Thêm mã giảm giá thành công');
                }
            }else{
                return redirect()->back()->with('error', ' Mã giảm giá không đúng hoặc đã hết hạn');
            }
        }

      
    }





}
