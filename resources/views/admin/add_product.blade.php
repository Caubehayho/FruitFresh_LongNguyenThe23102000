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
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM SẢN PHẨM</h2>
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
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    Vui lòng kiểm tra lại các trường thông tin
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm">
                                @error('product_name')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1"
                                    placeholder="Số lượng sản phẩm">
                                @error('product_quantity')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                @error('product_image')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"
                                    placeholder="Giá sản phẩm">
                                @error('product_price')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phân loại</label>
                                <input type="text" name="product_type" class="form-control" id="exampleInputEmail1"
                                    placeholder="Phân loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: : none" rows="2" type="password" name="product_desc" class="form-control"
                                    id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: : none" rows="6" type="password" name="product_content" class="form-control"
                                    id="exampleInputPassword1" placeholder="Mô tả nội dung sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục hoa quả</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Thương hiệu</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-success">Thêm sản
                                phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
