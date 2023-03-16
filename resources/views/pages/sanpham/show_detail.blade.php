@extends('master')
@section('content')
    @foreach ($product_details as $detail_pro)
        <div class="product-details">
            <!--product-details-->
            <div>
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="{{ URL::to('Up_Load/Product/' . $detail_pro->product_image) }}" alt="" />
                        <h3>ZOOM</h3>
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/1.jpg') }}"
                                        alt=""></a>
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/4.jpg') }}"
                                        alt=""></a>
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/1.jpg') }}"
                                        alt=""></a>
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/4.jpg') }}"
                                        alt=""></a>
                                <a href=""><img style="width: 84px; height: 84px" src="{{ URL::to('Front_End/Image/product-details/3.jpg') }}"
                                        alt=""></a>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="product-information">
                        <!--/product-information-->
                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                        <h1>{{ $detail_pro->product_name }}</h1>
                        <img src="{{ URL::to('Front_End/Image/product-details/rating.png') }}" alt="" />                                       
                        <form>
                            @csrf
                            <span>
                                <span>{{ number_format($detail_pro->product_price) . '_' . 'VNĐ' }}</span>
                                <label>Quantity:</label>
                                <input name="qty" type="number" min="1" value="1" />
                                <input name="productid_hidden" type="hidden" value="{{ $detail_pro->product_id }}" />
                            </span>
                            <p><b>Mã ID:</b> {{ $detail_pro->product_id }} </p>
                            <p><b>Tình trạng:</b> Còn hàng</p>
                            <p><b>Thương hiệu: </b>{{ $detail_pro->brand_name }}</p>
                            <p><b>Danh mục: </b>{{ $detail_pro->category_name }}</p>
                            <a href=""><img src="{{ URL::to('Front_End/Image/product-details/share.png') }}"
                                    class="share img-responsive" alt="" /></a>
                                {{-- ajax --}}
                                            <input type="hidden" class="cart_product_id_{{ $detail_pro->product_id }}"
                                                value="{{ $detail_pro->product_id }}">
                                            <input type="hidden" class="cart_product_name_{{ $detail_pro->product_id }}"
                                                value="{{ $detail_pro->product_name }}">
                                            <input type="hidden" class="cart_product_image_{{ $detail_pro->product_id }}"
                                                value="{{ $detail_pro->product_image }}">
                                            <input type="hidden" class="cart_product_price_{{ $detail_pro->product_id }}"
                                                value="{{ $detail_pro->product_price }}">
                                            <input type="hidden" class="cart_product_quantity_{{ $detail_pro->product_id }}"
                                                value="{{ $detail_pro->product_quantity }}">
                                            <input type="hidden" class="cart_product_qty_{{ $detail_pro->product_id }}"
                                            value="{{ 1 }}">
                                                
                                            
                                {{-- ajax --}}
                            <button style="margin-left: 0;margin-top: 15px; display: block" type="button"
                                class="btn btn-fefault add-to-cart" data-id_product={{$detail_pro->product_id}} name="add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm giỏ hàng
                            </button>
                            <div class="fb-share-button" data-href="http://127.0.0.1:8000/" data-layout="button_count"
                                data-size="large"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ $url_canonical }}&amp;src=sdkpreparse"
                                    class="fb-xfbml-parse-ignore">Chia sẻ</a>
                            </div>
                            {{-- <div class="fb-like" data-href="http://127.0.0.1:8000/"
                        data-width="" data-layout="standard" data-action="like"
                         data-size="small" data-share="false">
                        </div> --}}
                        </form>
                       
                    </div>
                    <!--/product-information-->
                </div>
            </div>
        </div>

        <!--/product-details-->


        <div style="margin-top: 20px" class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <iframe width="100%" height="350px" src="https://www.youtube.com/embed/1IwKWYNycj8" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay;
                    clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
            </div>
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li> 
                    <li><a href="#comment" data-toggle="tab">Bình luận</a></li>
                    <li><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>                            
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details">
                    <p>
                        {!! $detail_pro->product_content !!}
                    </p>
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    <p>
                        {!! $detail_pro->product_desc !!}
                    </p>
                </div>


                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>Admin</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>14-02-2023</a></li>
                        </ul>
                        <style type="text/css">
                            .style_comment{
                                background-color: #F0F0E9;
                                border: 1px solid gainsboro;
                                color: black;
                            }
                        </style>
                            <form>
                                @csrf
                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$detail_pro->product_id}}">
                                <div id="comment_show"></div>                      
                            </form>
                            
                            <?php
                            $customer_id = Session::get('customer_id');
                            $customer_name = Session::get('customer_name');
                            $customer_img = Session::get('customer_img');

                            if ($customer_id != null){
                                ?>
                               <p><b>Viết đánh giá của bạn</b></p>
                               <form action="#">
                                   <span>
                                       <input style="width: 100%; margin-left: 0" disabled type="text" placeholder="Tên bình luận" value="{{ $customer_name }}" class="comment_name" />
                                       {{-- <input type="email" placeholder="Email Address" /> --}}
                                   </span>
                                   <input type="hidden" name="comment_customer_img" class="comment_customer_img" value="{{ $customer_img }}">
                                   <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                                   <div id="notify_comment"></div>
                                   <b>Đánh giá sao: </b> <img src="images/product-details/rating.png" alt="" />
                                   <button type="button" class="btn btn-default pull-right send-comment">
                                       Gửi bình luận
                                   </button>
                               </form>
                            <?php
                            }

                            else {
                                    ?>
                               <span>
                                    Vui lòng đăng nhập để có thể đánh giá sản phẩm!
                               </span>
                                <?php
                                }
                                ?>

                            
                     
                    </div>
                </div>
                <div class="tab-pane fade " id="comment">
                    <div class="fb-comments" data-href="{{ $url_canonical }}" data-width="" data-numposts="5">
                    </div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
    @endforeach

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($relate as $relate_pro)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="max-height: 140px"
                                            src="{{ URL::to('Up_Load/Product/' . $relate_pro->product_image) }}"
                                            alt="" />
                                        <h2>{{ number_format($relate_pro->product_price) . ' ' . 'VNĐ' }}</h2>
                                        <p>{{ $relate_pro->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào
                                            giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection
