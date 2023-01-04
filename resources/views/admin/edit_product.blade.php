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
                        <h2 class="text-center items-center" style="margin-top: 30px; margin-bottom: 10px">CẬP NHẬT SẢN PHẨM</h2>
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
                        @foreach ($ListDataEditProduct as $Data)
                            <form role="form" action="{{ URL::to('/update-product/'.$Data->product_id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                        value="{{ $Data->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{ URL::to('Up_Load/Product/' . $Data->product_image) }}" height="200"
                                        width="200">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"
                                        value="{{ $Data->product_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phân loại</label>
                                    <input type="text" name="product_type" class="form-control" id="exampleInputEmail1"
                                        value="{{ $Data->product_type }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: : none" rows="2" type="password" name="product_desc" class="form-control"
                                        id="exampleInputPassword1">{{ $Data->product_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: : none" rows="6" type="password" name="product_content" class="form-control"
                                        id="exampleInputPassword1">{{ $Data->product_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Danh mục hoa quả</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach ($cate_product as $cate)
                                            @if ($cate->category_id == $Data->category_id)
                                                <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach ($brand_product as $brand)
                                            @if ($brand->brand_id == $Data->brand_id)
                                                <option selected value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                                </option>
                                            @else
                                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        @if($Data->product_status == 1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-success">Cập nhật sản
                                    phẩm</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
