@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách các đơn hàng</h3>
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
                        <th scope="col" class="sort" data-sort="budget">Tên người đặt</th>
                        <th scope="col" class="sort" data-sort="status">Tổng giá tiền</th>
                        <th scope="col" class="sort" data-sort="status">Tình trạng</th>
                        <th scope="col" class="sort" data-sort="status">Hiển thị</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($all_order as $order)
                        <tr>
                            <td class="budget">
                                {{ $order->customer_name }}
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">

                                    <span class="status">{{ $order->order_total }}</span>
                                </span>
                                {{-- <div class="avatar-group">
                                    <?php
                                    if ($order->category_status == 0) {
                                        ?>
                                    <a href={{ URL::to('hide-category-fruit/' . $order->category_id) }}><i
                                            class='fa-solid fa-toggle-off'></i>&nbsp;Danh mục đã bị ẩn</a>
                                    <?php
                                        } else {
                                        ?>
                                    <a href={{ URL::to('show-category-fruit/' . $order->category_id) }}><i
                                            class='fa-solid fa-toggle-on'></i>&nbsp;Dang mục đang hiển thị</a>
                                    <?php
                                    }
                                    ?>
                                </div> --}}
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">

                                    <span class="status">{{ $order->order_status }}</span>
                                </span>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('view-order/' . $order->order_id) }}"> <button
                                            class="btn btn-success">Sửa</button>
                                    </a>
                                    <a href="{{ URL::to('delete-order/'.$order->order_id) }}"> <button
                                        class="btn btn-warning">Xóa</button>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer py-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(Hiện tại)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">Tiếp theo</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
