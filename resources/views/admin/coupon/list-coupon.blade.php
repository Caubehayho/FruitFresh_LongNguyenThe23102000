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
                        <th scope="col" class="sort" data-sort="budget">Ngày bắt đầu</th>
                        <th scope="col" class="sort" data-sort="budget">Ngày kết thúc</th>
                        <th scope="col" class="sort" data-sort="status">Mã giảm giá</th>
                        <th scope="col" class="sort" data-sort="status">Số lượng mã</th>
                        <th scope="col" class="sort" data-sort="status">Điền kiện giảm giá</th>
                        <th scope="col" class="sort" data-sort="status">Số giảm</th>
                        <th scope="col" class="sort" data-sort="status">Tình trạng</th>
                        <th scope="col" class="sort" data-sort="status">Hết hạn</th>
                        <th scope="col" class="sort" data-sort="status">Tùy chọn</th>
                        <th scope="col" class="sort" data-sort="status">Gửi mã</th>
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
                            <td class="budget">
                                {{ $cou->coupon_date_start }}
                            </td>
                            <td class="budget">
                                {{ $cou->coupon_date_end }}
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
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($cou->coupon_status == 1) {
                                        ?>
                                            Đang kích hoạt
                                    <?php
                                        } else {
                                        ?>
                                            Đã khóa
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    
                                        @if(strtotime($cou->coupon_date_end)>=$today)   
                                            <span style="color: green">Còn hạn</span>
                                        @else
                                            <span style="color: red">Hết hạn</span>
                                        @endif
                                    
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href=""> <button type="button" class="btn btn-danger"
                                        onclick="confirm('Bạn có chắc chắn muốn xóa? ') === true ? window.location ='delete-coupon/{{$cou->coupon_id}}' : '';">
                                        Xóa mã</button>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    
                                    <p><a href="{{url('/send-coupon-vip',[

                                        
                                        'coupon_time'=>$cou->coupon_time,
                                        'coupon_condition'=>$cou->coupon_condition,
                                        'coupon_number'=>$cou->coupon_number,
                                        'coupon_code'=>$cou->coupon_code

                                    ])}}" class="btn btn-success">Gửi mã khách vip</a></p>

                                    <p><a href="{{url('/send-coupon',[

                                      
                                        'coupon_time'=>$cou->coupon_time,
                                        'coupon_condition'=>$cou->coupon_condition,
                                        'coupon_number'=>$cou->coupon_number,
                                        'coupon_code'=>$cou->coupon_code
                                         
                                    ])}}" class="btn btn-default">Gửi mã khách thường</a></p>
                                    
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
