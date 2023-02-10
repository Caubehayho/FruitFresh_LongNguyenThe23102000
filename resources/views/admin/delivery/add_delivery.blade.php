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
                        <h2 class="text-center items-center" style="margin-bottom: 20px">THÊM VẬN CHUYỂN</h2>
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
                        <form>
                            {{ csrf_field()}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">---Chọn tỉnh thành phố---</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                    <option value="">---Chọn quận huyện---</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15  wards">
                                    <option value="">---Chọn xã phường---</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Phí vận chuyển</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Nhập phí vận chuyển">
                            </div>

                            <button type="button" name="add_delivery" class="btn btn-success add_delivery">Thêm phí vận chuyển</button>
                        </form>
                    </div>

                    <div id="load_delivery">

                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
