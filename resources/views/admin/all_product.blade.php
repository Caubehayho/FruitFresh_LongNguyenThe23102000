@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách sản phẩm</h3>
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
                        {{-- <th scope="col" class="sort" data-sort="name">ID</th> --}}
                        <th scope="col" class="sort" data-sort="budget">Tên sản phẩm</th>
                        <th scope="col" class="sort" data-sort="status">Hình ảnh</th>
                        <th scope="col" class="sort" data-sort="budget">Số lượng</th>
                        {{-- <th scope="col" class="sort" data-sort="status">Mô tả sản phẩm</th>
                        <th scope="col" class="sort" data-sort="status">Giới thiệu sản phẩm</th> --}}
                        <th scope="col" class="sort" data-sort="status">Giá</th>
                        <th scope="col" class="sort" data-sort="status">Danh mục</th>
                        <th scope="col" class="sort" data-sort="status">Thương hiệu</th>
                        <th scope="col" class="sort" data-sort="name">Hiển thị</th>
                        <th scope="col" class="sort" data-sort="name">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($ListData as $Data)
                        <tr>
                            {{-- <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $Data->product_id }}</span>
                                    </div>
                                </div>
                            </th> --}}
                            <td class="budget">
                                {{ $Data->product_name }}
                            </td>
                            <td>
                                <img src="Up_Load/Product/{{ $Data->product_image }}" height="100" width="100">
                            </td>
                            <td class="budget">
                                {{ $Data->product_quantity }}
                            </td>
                            <td class="budget">
                                {{ $Data->product_price }}
                            </td>
                            <td class="budget">
                                {{ $Data->category_name }}
                            </td>
                            <td class="budget">
                                {{ $Data->brand_name }}
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($Data->product_status == 0) {
                                        ?>
                                    <a href={{ URL::to('hide-product/' . $Data->product_id) }}><i
                                            class='fa-solid fa-toggle-off'></i>&nbsp;Danh mục đã bị ẩn</a>
                                    <?php
                                        } else {
                                        ?>
                                    <a href={{ URL::to('show-product/' . $Data->product_id) }}><i
                                            class='fa-solid fa-toggle-on'></i>&nbsp;Dang mục đang hiển thị</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('edit-product/' . $Data->product_id) }}"> <button
                                            class="btn btn-success">Sửa</button>
                                    </a>
                                    <a href="" > 
                                        <button
                                        class="btn btn-warning check_del" 
                                        type="button"
                                        onclick="confirm('Bạn có chắc chắn muốn xóa? ') === true ? window.location ='delete-product/{{$Data->product_id}}' : '';">
                                        Xóa</button>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $all_product->links() }}
       
    </div>

   
@endsection
