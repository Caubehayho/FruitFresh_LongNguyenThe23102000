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
                        <h2 class="text-center items-center" style="margin-top: 30px; margin-bottom: 10px">CẬP NHẬT SLIDE</h2>
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
                        @foreach ($ListDataEditSlide as $Data)
                            <form role="form" action="{{ URL::to('/update-slide/'.$Data->slide_id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="slide_name" class="form-control" id="exampleInputEmail1"
                                        value="{{ $Data->slide_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh slide</label>
                                    <input type="file" name="slide_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{ URL::to('Up_Load/Slide/' . $Data->slide_image) }}" height="200"
                                        width="200">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả </label>
                                    <textarea style="resize: : none" rows="2" type="password" name="slide_desc" class="form-control"
                                        id="exampleInputPassword1">{{ $Data->slide_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: : none" rows="6" type="password" name="slide_content" class="form-control"
                                        id="exampleInputPassword1">{{ $Data->slide_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Hiển thị</label>
                                    <select name="slide_status" class="form-control input-sm m-bot15">
                                        @if($Data->slide_status == 1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-success">Cập nhật slide</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
