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
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM DANH MỤC HOA QUẢ</h2>
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
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                            {{ csrf_field() }}
                            @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Vui lòng kiểm tra lại các trường thông tin
                            </div>
                             @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                @error('category_product_name')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: : none" rows="8" type="password" name="category_product_desc" class="form-control" id="exampleInputPassword1"
                                    placeholder="Mô tả danh mục"></textarea>
                                    @error('category_product_desc')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-success">Thêm danh mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
