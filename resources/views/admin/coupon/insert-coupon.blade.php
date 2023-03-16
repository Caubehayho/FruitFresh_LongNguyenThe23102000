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
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM MÃ GIẢM GIÁ</h2>
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
                        <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                            {{ csrf_field() }}
                            @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Vui lòng kiểm tra lại các trường thông tin
                            </div>
                             @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1">
                                @error('coupon_name')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                <input type="text" name="coupon_date_start" class="form-control" id="start_coupon">
                                @error('coupon_date_start')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày kết thúc</label>
                                <input type="text" name="coupon_date_end" class="form-control" id="end_coupon">
                                @error('coupon_date_end')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
                                @error('coupon_code')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng mã</label>
                                <input type="text" name="coupon_time" class ="form-control" id="exampleInputEmail1">
                                @error('coupon_time')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tính năng mã</label>
                                <select name="coupon_condition" class="form-control input-sm m-bot15">
                                    <option value="0">---Chọn---</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                    @error('coupon_condition')
                                    <div style="color: red"><i>{{ $message }}</i></div>
                                    @enderror
                                </select>
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                                <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1">
                                @error('coupon_number')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>

                            <button type="submit" name="add_coupon" class="btn btn-success">Thêm mã</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
