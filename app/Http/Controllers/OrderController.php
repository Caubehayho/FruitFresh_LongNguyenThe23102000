<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Testid;
use App\Models\Product;
use DB;
use PDF;



class OrderController extends Controller
{


    public function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code){
        $order_details = OrderDetails::where('order_code', $checkout_code)->get();
        $order = Order::where('order_code', $checkout_code)->get();
        foreach($order as $key =>$ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;

        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();

         //tính tổng với coupon-start
        foreach($order_details_product as $key =>$order_d){ // lấy ra coupon để trừ vào tổng tiền tại admin -  view-details-order

            $product_coupon = $order_d->product_coupon;
        }

       
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();

            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
            if($coupon_condition==1){
                $coupon_echo = $coupon_number.'%';
            }
            else{
                $coupon_echo = number_format($coupon_number,0,',','.').'vnđ';
            }
        }else{
            $coupon_condition = 2;
            $coupon_number = 0; 
            $coupon_echo = '0';
        }
         //tính tổng với coupon-end

        $output = ' ';

        $output.='<style>
                        body{
                            font-family: Dejavu Sans;   
                        }
                        .table-styling{
                            border: 1px solid #000000;
                        }
                        .table-styling tr td{
                            border: 1px solid #000000;
                        }
                  </style>
            <h1><center>Công ty TNHH Hoa quả sạch Minh Trang Fruit</center></h1>
            <h2><center>Đặt lợi ích khách hàng lên hàng đầu</center></h2>
            <p>Người đặt hàng</p>
                  <table class="table-styling">
                        <thead>
                            <tr>
                                <th>Tên khách đặt</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                            </tr>   
                        </thead>
                        <tbody>';
                           
                                $output.='
                                    <tr>
                                        <td>'.$customer->customer_name.'</td>
                                        <td>'.$customer->customer_phone.'</td>
                                        <td>'.$customer->customer_email.'</td>
                                    </tr>';
                            
                                $output.='
                        </tbody>
                  </table>

                  <p>Ship hàng tới</p>
                  <table class="table-styling">
                        <thead>
                            <tr>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
                            </tr>   
                        </thead>
                        <tbody>';
                           
                                $output.='
                                    <tr>
                                        <td>'.$shipping->shipping_name.'</td>
                                        <td>'.$shipping->shipping_address.'</td>
                                        <td>'.$shipping->shipping_phone.'</td>
                                        <td>'.$shipping->shipping_email.'</td>
                                        <td>'.$shipping->shipping_notes.'</td>
                                    </tr>';
                            
                                $output.='
                        </tbody>
                  </table>

                  <p>Thông tin đơn hàng</p>
                  <table class="table-styling">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Mã giảm giá</th>
                                <th>Phí ship</th>
                                <th>Số lượng</th>
                                <th>Giá sản phẩm</th>
                                <th>Thành tiền</th>
                            </tr>   
                        </thead>
                        <tbody>';
                       
                        $total = 0;

                           foreach($order_details_product as $key =>$product){
                           $subtotal = $product->product_price*$product->product_sales_quantity;
                           $total += $subtotal;
                           if($product->product_coupon!= 'no'){
                                $product_coupon = $product->product_coupon;
                           }
                           else{
                                $product_coupon ='Không có mã';
                           }

                                $output.='
                                    <tr>
                                        <td>'.$product->product_name.'</td>
                                        <td>'.$product_coupon.'</td>
                                        <td>'.number_format($product->product_feeship,0,',','.').'vnđ</td>
                                        <td>'.$product->product_sales_quantity.'</td>
                                        <td>'.number_format($product->product_price,0,',','.').'vnđ</td>
                                        <td>'.number_format($subtotal,0,',','.').'vnđ</td>
                                    </tr>';
                    }

                    if($coupon_condition==1){
                        $total_after_coupon = ($total * $coupon_number)/100;
                       
                        echo '</br>';
                        $total_coupon = $total - $total_after_coupon;
                     }
                    else{
                        echo '</br>';
                        $total_coupon = $total - $coupon_number;
                    }

                                $output.='
                                <tr>
                                    <td colspan="2">
                                            <p>Tổng giảm:'.$coupon_echo.'</p>
                                            <p>Phí ship: '.number_format($product->product_feeship,0,',','.').'vnđ</p>
                                            <p>Thanh toán: '.number_format($total_coupon + $product->product_feeship,0,',','.').'vnđ</p>
                                    </td>
                                </tr>
                                ';
                                $output.='
                        </tbody>
                  </table>

                  <p>Ký tên</p>
                  <table class="table-styling">
                        <thead>
                            <tr>
                                <th >Người lập phiếu</th>
                                <th width="200px">Người nhận</th>
                            </tr>   
                        </thead>
                        <tbody>';
                           
                                $output.='
                                    <tr>
                                        <td colspan="4">Nguyễn Thế Long</td>
                                        <td colspan="1">Nguyễn Vân Anh</td>
                                    </tr>';
                            
                                $output.='
                        </tbody>
                  </table>';
                 


                  

                  return $output;
    }

    




    public function view_order($order_code){
        $title = 'Chi tiết đơn hàng';
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach($order as $key =>$ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

        foreach($order_details_product as $key =>$order_d){ // lấy ra coupon để trừ vào tổng tiền tại admin -  view-details-order

            $product_coupon = $order_d->product_coupon;
        }

       
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }


        return view('admin.view_order', compact('title'))->with(compact('order_details', 'customer', 'shipping', 'order_details','coupon_condition','coupon_number','order','order_status'));
    }
   



    public function manage_order(){
        $title = 'Quản lý đơn hàng';

        $order = Order::orderby('created_at', 'DESC')->get();
        return view('admin.manage_order', compact('title'))->with(compact('order'));
    }

    
    //update quantity order
    public function update_order_qty(Request $request){
        //update order
        $data = $request->all();
        $id = $data['order_id'];
        $order = DB::table('tbl_order')->where('order_id', $id)->update(['order_status'=>$data['order_status']]);
        // $tu = $order->order_status;
        $order_status = DB::table('tbl_order')->where('order_id', $id)->first();
        $quantity_order = $data['quantity'];
        if($order_status->order_status==2){
            foreach($data['order_product_id'] as $key =>$product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity; 
                $product_sold = $product->product_sold; 
                foreach($quantity_order as $key2 => $data_second){ 
                    if($key == $key2){ 
                        $product_remain = $product_quantity - $data_second; 
                        $product->product_quantity = $product_remain; 
                        $product->product_sold = $product_sold + $data_second; 
                        $product->save(); 
                    } 
                }
            }
        }elseif($order_status->order_status!=2){
            foreach($data['order_product_id'] as $key =>$product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity; 
                $product_sold = $product->product_sold; 
                foreach($quantity_order as $key2 => $data_second){ 
                    if($key == $key2){ 
                        $product_remain = $product_quantity + $data_second; 
                        $product->product_quantity = $product_remain; 
                        $product->product_sold = $product_sold - $data_second; 
                        $product->save(); 
                    } 
                }
            }
        }
    }


    //button capnhat quantity view_order
    public function update_qty(Request $request){
        $data = $request->all();
        $order_details = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
        
        $product_id = $data['order_product_id'];
        $order_code = $data['order_code'];
        DB::table('tbl_order_details')->where('product_id', $product_id)->where('order_code', $order_code)->update(['product_sales_quantity'=>$data['order_qty']]);

    }





}
