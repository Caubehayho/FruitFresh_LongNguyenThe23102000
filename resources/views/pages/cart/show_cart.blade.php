@extends('master')
@section('content')
    <section id="cart_items">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu text-center">
                            <td class="image">Hình ảnh</td>
                            <td style="text-align: left; padding-left: 60px" class="description">Mô tả</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td class="thaotac">Thao tác</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $v_content)
                            <tr class="text-center">
                                <td class="cart_product">
                                    <a href=""><img style="max-width: 120px "
                                            src="{{ URL::to('Up_Load/Product/' . $v_content->options->image) }}"
                                            alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $v_content->name }}</a></h4>
                                    {{-- <p>ID sản phẩm: {{ $v_content->id }}</p> --}}
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($v_content->price) . ' ' . 'vnđ' }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action="{{ URL::to('/update-cart-quantity') }}" method="post">
                                            {{ csrf_field() }}
                                            {{-- <input class="cart_quantity_input" type="number" min="1"
                                                name="cart_quantity" value="{{ $v_content->qty }}"> --}}
                                            <div class="number-input">
                                                <button
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                <input class="quantity" min="1" name="cart_quantity" value="{{ $v_content->qty }}"
                                                    type="number">
                                                <button
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                    class="plus"></button>
                                            </div>
                                            <input type="hidden" style="width: 50px" value="{{ $v_content->rowId }}"
                                                name="rowId_cart" class="form-control">
                                            {{-- <input type="submit" name="update_qty" value="Cập nhật"
                                                class="btn btn-default btn-sm"> --}}
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo number_format($subtotal) . ' ' . '<underline>vnđ';
                                        ?>
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ URL::to('delete-to-cart/' . $v_content->rowId) }}"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>
    <!--/#cart_items-->
    <section id="do_action">
            <div class="heading">
                <h3>Bạn có muốn đi tới thanh toán không?</h3>
                <p>Thêm phiếu giảm giá hoặc voucher ưu đãi của bạn</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Sử dụng mã code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Sử dụng voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Phiếu quà tặng</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>Việt Nam</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Huyện/Tỉnh:</label>
                                <select>
                                    <option>Ninh Bình</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Thêm gợi ý</a>
                        <a class="btn btn-default check_out" href="">Tiếp tục</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{ Cart::PriceTotal(0, ',', '.') . ' ' . 'vnđ' }}</span></li>
                            <li>Thuế <span>{{ Cart::tax(0, ',', '.') . ' ' . 'vnđ' }}</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{ Cart::total(0, ',', '.') . ' ' . 'vnđ' }}</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Cập nhật</a> --}}
                        <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != null){
                                    ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/check-out')}}">Thanh toán</a>
                                <?php
                                }

                                else {
                                    ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                                <?php
                                }
                                ?>
                    </div>
                </div>
            </div>
    </section>
    <!--/#do_action-->
@endsection
