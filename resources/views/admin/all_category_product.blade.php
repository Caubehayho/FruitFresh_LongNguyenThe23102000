@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
   
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách danh mục hoa quả</h3>
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
                        <th scope="col" class="sort" data-sort="budget">Tên danh mục</th>
                        <th scope="col" class="sort" data-sort="status">Mô tả</th>
                        <th scope="col" class="sort" data-sort="status">Trạng thái danh mục</th>
                        <th scope="col" class="sort" data-sort="status">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($ListData as $Data)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $Data->category_id }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{ $Data->category_name }}
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">

                                    <span class="status">{{ $Data->category_desc }}</span>
                                </span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($Data->category_status == 0) {
                                        ?>
                                    <a href={{ URL::to('hide-category-fruit/' . $Data->category_id) }}><i
                                            class='fa-solid fa-toggle-off'></i>&nbsp;Danh mục đã bị ẩn</a>
                                    <?php
                                        } else {
                                        ?>
                                    <a href={{ URL::to('show-category-fruit/' . $Data->category_id) }}><i
                                            class='fa-solid fa-toggle-on'></i>&nbsp;Dang mục đang hiển thị</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('edit-category-product/' . $Data->category_id) }}"> <button
                                            class="btn btn-success">Sửa</button>
                                    </a>
                                    <a href="{{ URL::to('delete-category-product/'.$Data->category_id) }}"> <button
                                        class="btn btn-warning">Xóa</button>
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
