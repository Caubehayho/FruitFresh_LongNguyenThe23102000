@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Liệt kê đơn hàng</h3>
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
                        <th scope="col" class="sort" data-sort="">Thứ tự</th>
                        <th scope="col" class="sort" data-sort="">Mã đơn hàng</th>
                        <th scope="col" class="sort" data-sort="">Tình trạng đơn hàng</th>
                        <th scope="col" class="sort" data-sort="">Ngày tháng đặt hàng</th>
                        <th scope="col" class="sort" data-sort="">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($order as $key  =>$ord)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td class="budget">
                                {{$i}}
                            </td>
                            <td class="budget">
                                {{ $ord->order_code }}
                            </td>
                            <td class="budget">
                                @if( $ord->order_status == 1)
                                    Đơn hàng mới
                                @else
                                    Đã xử lý
                                @endif
                            </td>
                            <td class="budget">
                                {{ $ord->created_at }}
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('view-order/' .$ord->order_code) }}"> <button
                                            class="btn btn-success">Xem</button>
                                    </a>
                                    <a href="{{ URL::to('delete-order/'.$ord->order_code) }}"> <button
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
