@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách khách hàng</h3>
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
                        <th scope="col" class="sort" data-sort="budget">Tên khách hàng</th>
                        <th scope="col" class="sort" data-sort="status">Hình ảnh</th>
                        <th scope="col" class="sort" data-sort="status">Email</th>
                        <th scope="col" class="sort" data-sort="status">Số điện thoại</th>
                        <th scope="col" class="sort" data-sort="status">Địa chỉ</th>
                        <th scope="col" class="sort" data-sort="status">Xếp hạng</th>
                        <th scope="col" class="sort" data-sort="status">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($all_user as $user)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $user->customer_id }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{ $user->customer_name }}
                            </td>
                            <td class="budget">
                                <img src="Up_Load/profile/{{ $user->customer_img }}" height="50" width="50">
                            </td>
                            <td class="budget">
                                {{ $user->customer_email }}
                            </td>
                            <td class="budget">
                                {{ $user->customer_phone }}
                            </td>
                            <td class="budget">
                                {{ $user->customer_address }}
                            </td>
                            <td class="budget">
                                <div class="avatar-group">
                                    
                                    @if($user->customer_vip == 1)   
                                        <span>Vip</span>
                                    @else
                                        <span>Thường</span>
                                    @endif
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('edit-user/' . $user->customer_id) }}"> <button
                                        class="btn btn-success">Sửa</button>
                                    </a>
                                    <a href=""> <button
                                        class="btn btn-warning"  onclick="confirm('Bạn có chắc chắn muốn xóa? ') === true ? window.location ='delete-user/{{$user->customer_id}}' : '';">Xóa</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        {{ $all_user->links() }}
    </div>
@endsection
