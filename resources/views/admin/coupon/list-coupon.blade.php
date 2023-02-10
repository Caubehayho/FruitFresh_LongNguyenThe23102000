@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Tất cả mã giảm giá</h3>
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
                        <th scope="col" class="sort" data-sort="name">ID</th>
                        <th scope="col" class="sort" data-sort="budget">Tên mã</th>
                        <th scope="col" class="sort" data-sort="status">Mã giảm giá</th>
                        <th scope="col" class="sort" data-sort="status">Số lượng mã</th>
                        <th scope="col" class="sort" data-sort="status">Điền kiện giảm giá</th>
                        <th scope="col" class="sort" data-sort="status">Số giảm</th>
                        <th scope="col" class="sort" data-sort="status">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($coupon as $cou)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $cou->coupon_id }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{ $cou->coupon_name }}
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">

                                    <span class="status">{{ $cou->coupon_code }}</span>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">

                                    <span class="status">{{ $cou->coupon_time }}</span>
                                </span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($cou->coupon_condition == 1) {
                                        ?>
                                            Giảm theo %
                                    <?php
                                        } else {
                                        ?>
                                            Giảm theo tiền
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($cou->coupon_condition == 1) {
                                        ?>
                                            Giảm {{$cou->coupon_number}} %
                                    <?php
                                        } else {
                                        ?>
                                             Giảm {{$cou->coupon_number}} k
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('delete-coupon/'.$cou->coupon_id) }}"> <button
                                        class="btn btn-warning">Xóa mã</button>
                                    </a>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default">Xóa</button> --}}
                                    {{-- <div class="modal fade" id="modal-default" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span>Bạn có chắn chắn xóa hay không?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ URL::to('delete-category-product/'.$Data->category_id) }}">
                                                        <button type="button" class="btn btn-primary">Đồng ý</button></a>
                                                    <button type="button" class="btn btn-link  ml-auto"
                                                        data-dismiss="modal">Thoát</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
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
