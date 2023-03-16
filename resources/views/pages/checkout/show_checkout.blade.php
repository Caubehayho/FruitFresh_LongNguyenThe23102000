@extends('master')
@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->



        <div class="register-req">
            <p>Làm ơn đăng kí hoặc đăng nhập để thanh toán giỏ hàng vè xem lại lịch sử mua hàng</p>
        </div>
        <!--/register-req-->



        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">

                            <form method="POST" style="width: 50%">
                                 @csrf
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Email*">
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên*">
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ*">
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại*">
                                <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn cho shop !!!" rows="5"></textarea>


                                @if(Session::get('fee'))
                                   <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">   
                                @else
                                    <input type="hidden" name="order_fee" class="order_fee" value="15000">   
                                @endif

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key =>$cou)
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}"> 
                                    @endforeach 
                                @else
                                     <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                @endif
                            

                                <div class="payment-options" style="margin-bottom: 0px">
                                    <div class="form-group">
                                        <label for="">Chọn hình thức thanh toán tiền</label>
                                        <select name="payment_select" id="payment_select" class="form-control input-sm m-bot15 payment_select">
                                            <option value="0">Qua chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="button" name="send_order" value="Xác nhận đơn hàng" class="btn btn-primary btn-sm send_order">
                            </form>
                            
                            <form style="width: 50%; padding-left:20px; padding-top:18px">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="">Chọn thành phố</label>
                                    <select style="height: 40px" name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                            <option value="">---Chọn tỉnh thành phố---</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Chọn quận huyện</label>
                                    <select style="height: 40px" name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                        <option value="">---Chọn quận huyện---</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Chọn xã phường</label>
                                    <select style="height: 40px" name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        <option value="">---Chọn xã phường---</option>
                                    </select>
                                </div>
    
                                <input type="button" name="caculate_order" value="Tính phí vận chuyển" class=" btn btn-primary btn-sm caculate_delivery">
                            </form>
                            
                        
            
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 clearfix">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                     @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                     @endif
                    <div class="table-responsive cart_info">
                        {{-- <div class="review-payment">
                            <h2>Xem lại giỏ hàng</h2>
                        </div> --}}
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu text-center">
                                    <td class="image">Hình ảnh</td>
                                    <td style="text-align: left; padding-left: 60px" class="description">Tên sản phẩm</td>
                                    <td class="price">Giá</td>
                                    <td class="quantity">Số lượng</td>
                                    <td class="total">Thành tiền</td>
                                    <td class="thaotac">Thao tác</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::get('cart') == true)
                                    @php
                                        $total = 0;
                                    @endphp
            
                                    @foreach (Session::get('cart') as $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                            $total += $subtotal;
                                        @endphp
                                        <form action="{{ url('/update-cart') }}" method="post">
                                            @csrf
                                            <tr class="text-center">
                                                <td class="cart_product">
                                                    <img style="max-width: 120px"
                                                        src="{{ asset('Up_Load/Product/' . $cart['product_image']) }}"
                                                        alt="{{ $cart['product_name'] }}">
                                                </td>
                                                <td class="cart_description">
                                                    <h4>{{ $cart['product_name'] }}</h4>
                                                    {{-- <p>ID sản phẩm: {{ $v_content->id }}</p> --}}
                                                </td>
                                                <td class="cart_price">
                                                    <p>{{ number_format($cart['product_price'], 0, ',', '.') }}vnđ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    <div class="cart_quantity_button">
            
                                                        <input class="cart_quantity_input" type="number" min="1"
                                                            name="cart_qty[{{ $cart['session_id'] }}]"
                                                            value="{{ $cart['product_qty'] }}">
                                                        {{-- <div class="number-input"> 
                                                                        <button
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                                        <input class="quantity" min="1" name="cart_quantity" value="{{ $v_content->qty }}"
                                                                            type="number">
                                                                        <button
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                            class="plus"></button>
                                                                    </div> --}}
                                                        {{-- <input type="hidden" style="width: 50px" value="" name="rowId_cart"
                                                        class="form-control"> --}}
            
            
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">
                                                        {{ number_format($subtotal, 0, ',', '.') }}vnđ
                                                    </p>
                                                </td>
                                                <td class="cart_delete">
                                                    <a class="cart_quantity_delete"
                                                        href="{{ '/del-product/' . $cart['session_id'] }}"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" style="text-align: right">
                                            <a class="btn btn-default check_out" href="{{ url('/del-all-product') }}">Xóa giỏ hàng</a>
                                            <input style="font-size: 14px" type="submit" name="update_qty" value="Cập nhật"
                                            class=" check_out btn btn-default btn-sm">
                                        </td>
                                    </tr>
                                    <tr style="background-color: aliceblue">
                                        <td colspan="1">
                                            <ul style="list-style: none; margin-top: 10px">
                                                {{-- <li>Tổng tiền: </li> --}}
                                                {{-- <li>Mã giảm giá:</li> --}}
                                                {{-- <li>Thuế: </li>
                                                <li>Phí vận chuyển:</li> --}}
                                                {{-- <li>Tiền sau khi giảm: </li> --}}
                                            </ul>
                                        </td>
                                        <td colspan="6">
                                            <ul style="list-style: none; padding-left: 0px; margin-top: 10px">
                                                <li>
                                                    <span style="margin-right: 11%">Tổng tiền :</span>
                                                    <span>{{ number_format($total, 0, ',', '.') }}vnđ</span>
                                                </li>
                                                <li>
                                                    {{-- <span> --}}
                                                        @if(Session::get('coupon'))
                                                            @foreach(Session::get('coupon') as $key => $cou)
                                                                @if($cou['coupon_condition']==1)
                                                                    <span style="margin-right: 12%">Mã giảm :</span>
                                                                    <span>{{$cou['coupon_number']}} %</span>
                                                                    <p style="margin-bottom: 0px">
                                                                        @php
                                                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                                                            echo '<span style="margin-right: 9.2%" >Số tiền giảm:</span>'.number_format($total_coupon,0,',','.').'vnđ';
                                                                        @endphp
                                                                    </p>
                                                                    <span style="margin-right: 5%">Tổng thanh toán: </span>{{ number_format($total-$total_coupon,0,',' , '.')}}vnđ
                                                                @elseif($cou['coupon_condition']==2)
                                                                        <span style="margin-right: 12.4%">Mã giảm: </span>{{ number_format($cou['coupon_number'], 0, ',', '.')}}k
                                                                        <p>
                                                                            @php
                                                                                $total_after_coupon = $total-$cou['coupon_number'];
                                                                            @endphp
                                                                        </p>
            
                                                                        <span style="margin-right: 5%">Tổng thanh toán: </span>{{ number_format($total_after_coupon, 0, ',', '.')}}vnđ
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    {{-- </span> --}}
                                                 </li>
                                                {{-- <li><span>0%</span></li>
                                                <li><span>free</span></li> --}}
                                               @if(Session::get('fee'))
                                                    <li>
                                                        <a class="cart_quantity_delete" href="{{ '/del-fee' }}"><i class="fa-solid fa-trash"></i></a>
                                                        <span style="margin-right: 6.5%">Phí vận chuyển:</span>{{ number_format(Session::get('fee'), 0, ',', '.')}}vnđ
                                                        <?php $total_after_fee = $total + Session::get('fee'); ?>
                                                    </li>
                                                    <li>
                                                        <span>Tổng còn: </span>
                                                        @php
                                                        if(Session::get('fee') && !Session::get('coupon')){
                                                            $total_after = $total_after_fee;
                                                            echo  number_format($total_after, 0, ',', '.').'vnđ';
                                                        }elseif(!Session::get('fee') && Session::get('coupon')){
                                                            $total_after = $total_after_coupon;
                                                            echo  number_format($total_after, 0, ',', '.').'vnđ';
                                                        }elseif(Session::get('fee') && Session::get('coupon')){
                                                            $total_after = $total_after_coupon;
                                                            $total_after =  $total_after + Session::get('fee');
                                                            echo  number_format($total_after, 0, ',', '.').'vnđ';
                                                        }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                            $total_after = $total;
                                                            echo  number_format($total_after, 0, ',', '.').'vnđ';
                                                        }
                                                    @endphp
                                                    </li>
                                                   

                                               @endif
                                            </ul>
                                        </td>
                                    </tr>
            
                                    </form>
                                        @if(Session::get('cart'))
                                            <tr>
                                                <td colspan="7">
                                                        <form method="POST" action="{{'/check-coupon'}}">
                                                            @csrf
                                                                <input type="text" class="form-control check_out" name="coupon" style="width: 90%; background-color: white; color: black; out-line: none" placeholder="Nhập mã giảm giá">
                                                                <br>
                                                                <input type="submit" class="btn btn-default check_coupon check_out" value="Tính mã giảm giá" name="check_coupon" style="width: 90%">
                                                                @if(Session::get('coupon'))
                                                                <a class="btn btn-default check_out" href="{{ url('/unset-coupon') }}">Xóa Mã khuyến mãi</a>
                                                                @endif
                                                        </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('/vnpay-payment') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-default check_out" name="redirect">Thanh toán VNPay</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <center>
                                                @php
                                                    echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                                @endphp
                                            </center>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--/#cart_items-->
@endsection
