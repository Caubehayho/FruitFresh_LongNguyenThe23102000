@extends('admin_layout')
@section('title')
    {{ $title }}
@endsection
@section('Admin.Dashboard')
    <div class="card">
        <div class="card-header border-0">
            <h3 class="mb-0">Thông tin khách hàng đăng nhập</h3>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Tên khách hàng</th>
                        <th scope="col" class="sort" data-sort="status">Số điện thoại</th>
                        <th scope="col" class="sort" data-sort="status">Email</th>
                    </tr>
                </thead>
                <tbody class="list">

                    <tr>
                        <td class="budget">
                            {{ $customer->customer_name }}
                        </td>

                        <td>
                            {{ $customer->customer_phone }}
                        </td>

                        <td>
                            {{ $customer->customer_email }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header border-0">
            <h3 class="mb-0">Chi tiết đơn hàng</h3>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Thứ tự</th>
                        <th scope="col" class="sort" data-sort="budget">Tên sản phẩm</th>
                        <th scope="col" class="sort" data-sort="budget">Mã giảm giá</th>
                        <th scope="col" class="sort" data-sort="budget">Phí vận chuyển</th>
                        <th scope="col" class="sort" data-sort="status">Số lượng</th>
                        <th scope="col" class="sort" data-sort="status">Giá sản phẩm</th>
                        <th scope="col" class="sort" data-sort="status">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach ($order_details as $key => $details)
                        @php
                            $i++;
                            $subtotal = $details->product_price * $details->product_sales_quantity;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="budget">
                                {{ $i }}
                            </td>

                            <td>
                                {{ $details->product_name }}
                            </td>

                            <td>
                                @if ($details->product_coupon != 'no')
                                    {{ $details->product_coupon }}
                                @else
                                    Không áp mã
                                @endif
                            </td>

                            <td>
                                {{number_format($details->product_feeship,0,',','.')}}vnđ
                            </td>

                            <td>
                                {{ $details->product_sales_quantity }}
                            </td>

                            <td>
                                {{ number_format($details->product_price, 0, ',', '.') }}vnđ
                            </td>

                            <td>
                                {{ number_format($subtotal, 0, ',', '.') }}vnđ
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        {{-- <td colspan="5"><span style="margin-right: 20px">Tổng thanh toán:</span>{{number_format($total,0,',','.')}}vnđ</td> --}}
                        <td colspan="5">
                            @php
                                $total_coupon =0;
                            @endphp
                            @if($coupon_condition==1)
                                @php
                                   $total_after_coupon = ($total * $coupon_number)/100;
                                   echo 'Tổng giảm:', $coupon_number, '%',' ', '=',' ', number_format($total_after_coupon,0,',','.'),'vnđ';
                                   echo '</br>';
                                   $total_coupon = $total - $total_after_coupon - $details->product_feeship;
                                @endphp
                            @else
                                @php
                                    echo 'Tổng giảm:',' ',number_format($coupon_number,0,',','.'), 'vnđ'; 
                                    echo '</br>';
                                    $total_coupon = $total - $coupon_number - $details->product_feeship;
                                @endphp
                            @endif
                            <span style="margin-right: 20px">
                                @php
                                    
                                @endphp
                                Phí ship:  {{number_format($details->product_feeship,0,',','.')}}vnđ
                                </br>
                                Tổng thanh toán: {{number_format($total_coupon,0,',','.')}}vnđ
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a target="_blank" href="{{URL::to('/print-order/'.$details->order_code)}}">In đơn hàng</a>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header border-0">
            <h3 class="mb-0">Thông tin vận chuyển</h3>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Tên người vận chuyển</th>
                        <th scope="col" class="sort" data-sort="status">Địa chỉ</th>
                        <th scope="col" class="sort" data-sort="status">Số điện thoại</th>
                        <th scope="col" class="sort" data-sort="status">Ghi chú đơn hàng</th>
                        <th scope="col" class="sort" data-sort="status">Hình thức thanh toán</th>
                    </tr>
                </thead>
                <tbody class="list">

                    <tr>
                        <td class="budget">
                            {{ $shipping->shipping_name }}
                        </td>

                        <td>
                            {{ $shipping->shipping_address }}
                        </td>

                        <td>
                            {{ $shipping->shipping_phone }}
                        </td>

                        <td>
                            {{ $shipping->shipping_notes }}
                        </td>

                        <td>
                            @if ($shipping->shipping_method == 0)
                                Chuyển khoản
                            @else
                                Tiền mặt
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
