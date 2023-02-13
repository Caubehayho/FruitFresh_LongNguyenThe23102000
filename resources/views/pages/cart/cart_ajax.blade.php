@extends('master')
@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>

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
                                                                    $total_coupon = $total-$cou['coupon_number'];
                                                                @endphp
                                                            </p>

                                                            <span style="margin-right: 5%">Tổng thanh toán: </span>{{ number_format($total_coupon, 0, ',', '.')}}vnđ
                                                    @endif
                                                @endforeach
                                            @endif
                                        {{-- </span> --}}
                                     </li>
                                    {{-- <li><span>0%</span></li>
                                    <li><span>free</span></li> --}}
                                    {{-- <li><span>Chưa có dữ liệu</span></li> --}}
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
                                                    @if(Session::get('customer_id'))
                                                        <a class="btn btn-default check_out" href="{{ url('/check-out') }}">Đặt hàng</a>
                                                    @else
                                                        <a class="btn btn-default check_out" href="{{ url('/login-checkout') }}">Đặt hàng</a>
                                                    @endif
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
    </section>
    <!--/#cart_items-->
    <section id="do_action">
        <div class="heading">
            <h3>Bạn có muốn đi tới thanh toán không?</h3>
            <p>Thêm phiếu giảm giá hoặc voucher ưu đãi của bạn</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Sử dụng mã code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Sử dụng voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Phiếu quà tặng</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>Việt Nam</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Huyện/Tỉnh:</label>
                            <select>
                                <option>Ninh Bình</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Thêm gợi ý</a>
                    <a class="btn btn-default check_out" href="">Tiếp tục</a>
                </div>
            </div>
            {{-- <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền: <span>{{ number_format($total, 0, ',', '.') }}vnđ</span></li>
                        <li>Thuế <span></span></li>
                        <li>Phí vận chuyển <span>free</span></li>
                        <li>Tiền sau khi giảm <span></span></li>
                    </ul>
                    
                    <a class="btn btn-default check_out" href="">Thanh toán</a>
                    <a class="btn btn-default check_out" href="">Tính mã giảm giá</a>
                </div>
            </div> --}}
        </div>
    </section>
    <!--/#do_action-->
@endsection
