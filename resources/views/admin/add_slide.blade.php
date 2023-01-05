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
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM SLIDE</h2>
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
                        <form role="form" action="{{URL::to('/save-slide')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" name="slide_name" class="form-control" id="exampleInputEmail1" placeholder="Tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh slide</label>
                                <input type="file" name="slide_image" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả slide</label>
                                <textarea style="resize: : none" rows="2" type="password" name="slide_desc" class="form-control" id="exampleInputPassword1"
                                    placeholder="Mô tả slide"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung slide</label>
                                <textarea style="resize: : none" rows="6" type="password" name="slide_content" class="form-control" id="exampleInputPassword1"
                                    placeholder="Nội dung slide"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="slide_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-success">Thêm slide</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
