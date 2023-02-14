@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="row card">
        <div class="col-lg-12">
            <section class="panel pt-4 pb-4 pl-4 pr-4">
                <header class="panel-heading">
                    <div>
                        <h2 class="text-center items-center" style="margin-bottom: 20px">Thêm slide</h2>
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
                        <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên slide</label>
                                <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên slide">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea style="resize: : none" rows="8" type="password" name="slider_des" class="form-control" id="exampleInputPassword1"
                                    placeholder="Mô tả slide"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea style="resize: : none" rows="8" type="password" name="slider_content" class="form-control" id="exampleInputPassword1"
                                    placeholder="Mô tả nội dung slide"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn slider</option>
                                    <option value="1">Hiển thị slider</option>
                                </select>
                            </div>
                            <button type="submit" name="add_slider" class="btn btn-success">Thêm slider</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
