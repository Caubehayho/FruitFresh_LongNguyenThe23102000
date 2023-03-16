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
                        <h2 class="text-center items-center" style="margin-top: 30px; margin-bottom: 10px">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2>
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
                        @foreach ($ListUser as $user)
                        <form role="form" action="{{URL::to('/update-user/'.$user->customer_id)}}" method="post">
                            {{ csrf_field() }}
                            @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Vui lòng kiểm tra lại các trường thông tin
                            </div>
                             @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                <input type="text" value="{{ $user->customer_name }}" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="Tên khách hàng">
                                @error('customer_name')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" value="{{ $user->customer_email }}" name="customer_email" class="form-control" id="exampleInputPassword1"></input>
                                @error('customer_email')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ</label>
                                <input type="text" value="{{ $user->customer_address }}" name="customer_address" class="form-control" id="exampleInputPassword1"></input>
                                @error('customer_address')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại</label>
                                <input type="text" value="{{ $user->customer_phone }}" name="customer_phone" class="form-control" id="exampleInputPassword1"></input>
                                @error('customer_phone')
                                <div style="color: red"><i>{{ $message }}</i></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Xếp hạng</label>
                                <select name="customer_vip" class="form-control input-sm m-bot15">
                                    @if($user->customer_vip == 1)
                                    <option selected value="1">Vip</option>
                                    <option value="0">Thường</option>
                                @else
                                    <option value="1">Vip</option>
                                    <option selected value="0">Thường</option>
                                @endif
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-success">Cập nhật</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
