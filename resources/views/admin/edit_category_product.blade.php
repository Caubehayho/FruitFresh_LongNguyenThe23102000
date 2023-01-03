@extends('admin_layout')
@section('Admin.Dashboard')
    <div class="row card">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        <h2 class="text-center items-center" style="margin-bottom: 20px">EDIT DANH MỤC HOA QUẢ</h2>
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
                    <div class="position-center">
                        @foreach ($ListDataEdit as $Data)
                        <form role="form" action="{{URL::to('/update-category-product/'.$Data->category_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{ $Data->category_name }}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: : none" rows="8" type="password" name="category_product_desc" class="form-control" id="exampleInputPassword1">{{ $Data->category_desc }}</textarea>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
