@extends('master')
@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <!--/review-payment-->
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
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

        <div class="payment-options">
            <span>
                <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM </label>
            </span>
            <span>
                <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt </label>
            </span>
            <span>
                <label><input name="payment_option" type="checkbox"> Trả qua momo </label>
            </span>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
