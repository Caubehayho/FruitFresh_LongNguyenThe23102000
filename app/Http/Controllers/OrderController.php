<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;

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

        $output = ' ';

        $output.='<style>
                        body{
                            font-family: Dejavu Sans;
                        }
                  </style>
            <h1><center>Công ty TNHH Hoa quả sạch Minh Trang Fruit</center></h1>
            <h2><center>Đặt lợi ích khách hàng lên hàng đầu</center></h2>
                  <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Tên khách đặt</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                            </tr>   
                        </thead>
                        <tbody>
                            
                        </tbody>
                  </table>';
                  return $output;
    }

    




    public function view_order($order_code){
        $title = 'Chi tiết đơn hàng';
        $order_details = OrderDetails::where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach($order as $key =>$ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
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


        return view('admin.view_order', compact('title'))->with(compact('order_details', 'customer', 'shipping', 'order_details','coupon_condition','coupon_number'));
    }
   



    public function manage_order(){
        $title = 'Quản lý đơn hàng';

        $order = Order::orderby('created_at', 'DESC')->get();
        return view('admin.manage_order', compact('title'))->with(compact('order'));
    }
}
