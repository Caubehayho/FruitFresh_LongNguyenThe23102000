@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
  
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Danh sách bài viết</h3>
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
                        <th scope="col" class="sort" data-sort="budget">Tiêu đề bài viết</th>
                        <th scope="col" class="sort" data-sort="budget">Hình ảnh</th>
                        <th scope="col" class="sort" data-sort="status">Nội dung bài viết</th>
                        <th scope="col" class="sort" data-sort="name">Hiển thị</th>
                        <th scope="col" class="sort" data-sort="name">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($ListPost as $Data)
                        <tr>
                            <td class="budget">
                                {{ $Data->post_id }}
                            </td>
                            <td class="budget">
                                {{ $Data->post_name }}
                            </td>
                            <td>
                                <img src="Up_Load/Post/{{ $Data->post_image }}" height="100" width="100">
                            </td>
                            <td class="budget">
                                {{ $Data->post_des }}
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <?php
                                    if ($Data->post_status == 0) {
                                        ?>
                                    <a href={{ URL::to('hide-post/' . $Data->post_id) }}><i
                                            class='fa-solid fa-toggle-off'></i>&nbsp;Bài viết đã bị ẩn</a>
                                    <?php
                                        } else {
                                        ?>
                                    <a href={{ URL::to('show-post/' . $Data->post_id) }}><i
                                            class='fa-solid fa-toggle-on'></i>&nbsp;Bài viết đang hiển thị</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <a href="{{ URL::to('edit-post/' . $Data->post_id) }}"> <button
                                            class="btn btn-success">Sửa</button>
                                    </a>
                                    <a href="{{ URL::to('delete-post/'.$Data->post_id) }}"> <button
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
