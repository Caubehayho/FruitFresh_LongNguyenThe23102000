@extends('master')
@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        @foreach ($search_product as $product)
            <div class="col-sm-4">
                <a style="display: block" href="{{ URL::to('chi-tiet-hoa-qua/' . $product->product_id) }}">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img style="max-height: 190px" src="{{ URL::to('Up_Load/Product/' . $product->product_image) }}"
                                    alt="" />
                                <h2>{{ number_format($product->product_price) . ' ' . 'VNĐ' }}</h2>
                                <p>{{ $product->product_name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a>
                                </li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            </a>
        @endforeach
    </div>
@endsection
