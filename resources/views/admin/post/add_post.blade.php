@extends('admin_layout')
@section('title')
    {{ $title }}
@endsection
@section('Admin.Dashboard')
    <div class="row card">
        <div class="col-lg-12">
            <section class="panel pt-4 pb-4 pl-4 pr-4">
                <header class="panel-heading">
                    <div>
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM BÀI VIẾT</h2>
                    </div>
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                    <div class="position-center ">
                        <form role="form" action="{{ URL::to('/save-post') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    Vui lòng kiểm tra lại các trường thông tin
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                <input type="text" name="post_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tiêu đề bài viết">
                                @error('post_name')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: : none" rows="2" type="password" name="post_des" class="form-control"
                                    id="exampleInputPassword1" placeholder="Nội dung bài viết"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_post" class="btn btn-success">Thêm bài viết</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
