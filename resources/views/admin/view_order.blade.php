@extends('admin_layout')
@section('title')
    {{ $title }}
@endsection
@section('Admin.Dashboard')
    <div class="card">
        <div class="card-header border-0">
            <h3 class="mb-0">Thông tin người mua hàng</h3>
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
                            {{$order_by_id->customer_name}}
                        </td>

                        <td>
                            {{$order_by_id->customer_phone}}
                        </td>

                        <td>
                            {{$order_by_id->customer_email}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header border-0">
            <h3 class="mb-0">Thông tin đơn hàng</h3>
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
                        <th scope="col" class="sort" data-sort="budget">Tên sản phẩm</th>
                        <th scope="col" class="sort" data-sort="status">Số lượng</th>
                        <th scope="col" class="sort" data-sort="status">Giá</th>
                        <th scope="col" class="sort" data-sort="status">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody class="list">

                    <tr>
                       
                        <td class="budget">
                            {{$order_by_id->product_name}}
                        </td>

                        <td>
                            {{$order_by_id->product_sales_quantity}}
                        </td>

                        <td>
                            {{$order_by_id->product_price}}
                        </td>

                        <td>
                            {{$order_by_id->product_price*$order_by_id->product_sales_quantity}}
                        </td>
                      
                    </tr>
                </tbody>
            </table>
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
                    </tr>
                </thead>
                <tbody class="list">

                    <tr>
                        <td class="budget">
                            {{$order_by_id->shipping_name}}
                        </td>

                        <td>
                            {{$order_by_id->shipping_address}}
                        </td>

                        <td>
                            {{$order_by_id->shipping_phone}}
                        </td>

                        <td>
                            {{$order_by_id->shipping_notes}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
