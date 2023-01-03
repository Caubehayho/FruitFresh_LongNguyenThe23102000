@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    {{-- <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên danh mục</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_category_product as $key => $cate_pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $cate_pro->category_name }}</td>
                                <td><span class="text-ellipsis">
                                    <?php
                                    if ($cate_pro->category_status == 0) {
                                        echo '<a href="#"><span class= "fa-solid fa-eye"></span></a>';
                                    } else {
                                        echo '<a href="#"><span class= "fa-solid fa-eye-slash"></span></a>';
                                    }
                                    ?>
                                </span></td>
                                <td>
                                    <a href="" class="active" ui-toggle-class=""><i
                                            class="fa-solid fa-pencil text-success text-active"></i><i
                                            class="fa-solid fa-trash text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div> --}}
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách danh mục</h3>
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
