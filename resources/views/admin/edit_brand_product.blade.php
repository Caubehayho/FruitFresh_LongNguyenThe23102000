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
                        <h2 class="text-center items-center" style="margin-top: 30px; margin-bottom: 10px">EDIT THƯƠNG HIỆU</h2>
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
                        <form role="form" action="{{URL::to('/update-brand-product/'.$Data->brand_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" value="{{ $Data->brand_name }}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: : none" rows="8" type="password" name="brand_product_desc" class="form-control" id="exampleInputPassword1">{{ $Data->brand_desc }}</textarea>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật thương hiệu</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
