@extends('master')
@section('content')
    <div class="features_items">
        <!--features_items-->
        @foreach ($category_name as $name_cate)
            <h2 class="title text-center">{{ $name_cate->category_name }}</h2>
        @endforeach
        @foreach ($category_by_id as $product_category)
            <a href="{{ URL::to('chi-tiet-hoa-qua/' . $product_category->product_id) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img style="max-height: 130px" src="{{ URL::to('Up_Load/Product/' . $product_category->product_image) }}"
                                    alt="" />
                                <h2>{{ number_format($product_category->product_price) . ' ' . 'VNĐ' }}</h2>
                                <p>{{ $product_category->product_name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                    vào
                                    giỏ hàng</a>
                            </div>
                            {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ number_format($product->product_price) . ' ' . 'VNĐ' }}</h2>
                                <p>{{ $product->product_name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                    to
                                    cart</a>
                            </div>
                        </div> --}}
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
