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
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar1.jpg') }}"
                                        alt=""></a>
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar2.jpg') }}"
                                        alt=""></a>
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar1.jpg') }}"
                                        alt=""></a>
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar2.jpg') }}"
                                        alt=""></a>
                                <a href=""><img src="{{ URL::to('Front_End/Image/product-details/similar3.jpg') }}"
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
                                <span>{{ number_format($detail_pro->product_price) . '_' . 'VN??' }}</span>
                                <label>Quantity:</label>
                                <input name="qty" type="number" min="1" value="1" />
                                <input name="productid_hidden" type="hidden" value="{{ $detail_pro->product_id }}" />
                            </span>
                            <p><b>M?? ID:</b> {{ $detail_pro->product_id }} </p>
                            <p><b>T??nh tr???ng:</b> C??n h??ng</p>
                            <p><b>Th????ng hi???u: </b>{{ $detail_pro->brand_name }}</p>
                            <p><b>Danh m???c: </b>{{ $detail_pro->category_name }}</p>
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
                                                
                                            
                                {{-- ajax --}}
                            <button style="margin-left: 0;margin-top: 15px; display: block" type="button"
                                class="btn btn-fefault add-to-cart" data-id_product={{$detail_pro->product_id}} name="add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Th??m gi??? h??ng
                            </button>
                            <div class="fb-share-button" data-href="http://127.0.0.1:8000/" data-layout="button_count"
                                data-size="large"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ $url_canonical }}&amp;src=sdkpreparse"
                                    class="fb-xfbml-parse-ignore">Chia s???</a>
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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#comment" data-toggle="tab">B??nh lu???n</a></li>
                    <li><a href="#details" data-toggle="tab">M?? t??? s???n ph???m</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi ti???t s???n ph???m</a></li>
                    <li><a href="#reviews" data-toggle="tab">????nh gi?? (5)</a></li>            
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


                <div class="tab-pane fade " id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Write Your Review</b></p>

                        <form action="#">
                            <span>
                                <input type="text" placeholder="Your Name" />
                                <input type="email" placeholder="Email Address" />
                            </span>
                            <textarea name=""></textarea>
                            <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="comment">
                    <div class="fb-comments" data-href="{{ $url_canonical }}" data-width="" data-numposts="5">
                    </div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
    @endforeach

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">S???n ph???m li??n quan</h2>

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
                                        <h2>{{ number_format($relate_pro->product_price) . ' ' . 'VN??' }}</h2>
                                        <p>{{ $relate_pro->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Th??m v??o
                                            gi??? h??ng</a>
                                    </div>
                                    {{-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ number_format($product->product_price) . ' ' . 'VN??' }}</h2>
                                        <p>{{ $product->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                            to
                                            cart</a>
                                    </div>
                                </div> --}}
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
