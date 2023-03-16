@extends('master')
@section('content')
    <div class="features_items row">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach ($all_product as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">

                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                                <input type="hidden" class="cart_product_id_{{ $product->product_id }}"
                                    value="{{ $product->product_id }}">
                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}"
                                    value="{{$product->product_name}}" class="cart_product_name{{$product->product_id}}">
                                <input type="hidden" class="cart_product_name_{{ $product->product_id }}"
                                    value="{{ $product->product_name }}">
                                <input type="hidden" class="cart_product_quantity_{{ $product->product_id }}"
                                     value="{{ $product->product_quantity }}">
                                <input type="hidden" class="cart_product_image_{{ $product->product_id }}"
                                    value="{{ $product->product_image }}">
                                <input type="hidden" class="cart_product_price_{{ $product->product_id }}"
                                    value="{{ $product->product_price }}">
                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}"
                                    value="{{number_format($product->product_price,0,',','.')}}VND" class="cart_product_price{{$product->product_id}}">
                                <input type="hidden" class="cart_product_qty_{{ $product->product_id }}"
                                    value="{{ 1 }}">
                                    
                                <a style="display: block" id="wishlist_producturl{{$product->product_id}}" href="{{ URL::to('chi-tiet-hoa-qua/' . $product->product_id) }}">
                                    {{-- <img style="max-height: 190px"
                                        src="{{ URL::to('Up_Load/Product/' . $product->product_image) }}" alt="" /> --}}

                                        <img id="wishlist_productimage{{$product->product_id}}" src="{{URL::to('Up_Load/Product/' . $product->product_image)}}"alt="" />

                                    <h2>{{ number_format($product->product_price) . ' ' . 'VNĐ' }}</h2>
                                    <p>{{ $product->product_name }}</p>
                                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
                                </a>
                                <button type="button" class="btn btn-default add-to-cart" data-id_product={{$product->product_id}} name="add-to-cart">
                                    Thêm giỏ hàng
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <style type="text/css">
                                ul.nav.nav-pills.nav-justified li{
                                    text-align: center;
                                font-size: 13px;
                                 }
                                 .button_wishlist{
                                    border: none;
                                    background: #ffff;
                                    color: #B3AFA8;
                                 }
                                 ul.nav.nav-pills.nav-justified i{
                                    color: #B3AFA8;
                                 }
                                 .button_wishlist span:hover{
                                    color: #44a41b;
                                 }
                                 .button_wishlist:focus{
                                    border: none;
                                    outline: none;
                                 }

                            </style>
                            <li>
                                <i class="fa fa-plus-square"></i>
                                <button class="button_wishlist" id={{$product->product_id}} onclick="add_wishlist(this.id);"><span>Thêm yêu thích</span></button>
                            </li>
                            {{-- <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a>
                            </li> --}}
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
