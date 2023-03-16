<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Minh&Trang Fruit</title>
    <!-- Start of Async Drift Code -->
    <script>
        "use strict";

        ! function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void(window.console && console.error && console.error(
                    "Drift snippet included twice."));
                t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page",
                        "hide", "off", "on"
                    ],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function(e) {
                        t[e] = t.factory(e);
                    }), t.load = function(t) {
                        var e = 3e5,
                            n = Math.ceil(new Date() / e) * e,
                            o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src =
                            "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('xt65ryvvvnes');
    </script>
    <!-- End of Async Drift Code -->
    {{-- seo --}}
    {{-- <link rel="canonical" href="{{$url_canonical}}"> --}}
    {{-- seo-end --}}

    <meta property="og:site_name" content="http://127.0.0.1:8000/">

    <link href="{{ asset('Front_End/Css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/Css/sweetalert.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('Back_End/image/logoduahau.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/5bf87cd97a.js" crossorigin="anonymous"></script>

    {{-- Flicktiky --}}
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 867 471 823</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> longvanh2000@gmail.com </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left" style=" display: flex">
                            <a style="display: block; max-width: 320px;" href="{{ URL::to('/Trangchu') }}">
                                <img style="width: 100%; height: 100%"
                                    src="{{ asset('Back_End/image/logominhtrang1.png') }}"alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li>

                                <?php
                                $customer_id = Session::get('customer_id');
                                $customer_name = Session::get('customer_name');
                                $customer_img = Session::get('customer_img');
                                $shipping_id = Session::get('shipping_id');
                                // dd( $customer_name);

                                if ($customer_id != null){
                                ?>
                                <li>
                                    <a href="{{ URL::to('/payment') }}"><i class="fa fa-crosshairs"></i> Thanh
                                        toán</a>
                                </li>
                                <?php
                                }

                                else {
                                    ?>
                                <li>
                                    <a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Thanh
                                        toán</a>
                                </li>
                                <?php
                                }
                                ?>

                                <li><a href="{{ URL::to('/giohang') }}"><i class="fa fa-shopping-cart"></i> Giỏ
                                        hàng</a></li>

                                <?php

                                $customer_id = Session::get('customer_id');
                                // dd($customer_id);
                                if ($customer_id != null){
                                    ?>
                                <li>

                                    <a href="{{ URL::to('/profile/' . $customer_id) }}"><i
                                            class="fa-solid fa-user"></i>profile</a>

                                </li>
                                <?php
                                }

                                else {
                                    ?>
                                <li>

                                </li>
                                <?php
                                }
                                ?>


                                <?php
                                $customer_id = Session::get('customer_id');
                                // dd($customer_id);
                                if ($customer_id != null){
                                    ?>
                                <li>
                                    <a href="{{ URL::to('/logout-checkout') }}"><i
                                            class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                                </li>
                                <?php
                                }

                                else {
                                    ?>
                                <li>
                                    <a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Đăng nhập</a>
                                </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row" style="align-items: center; display: flex">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('Trangchu') }}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Product Details</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Cart</a></li>
                                        <li><a href="#">Login</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ URL::to('/news') }}">Tin tức</a>
                                </li>
                                <li><a href="{{ URL::to('/giohang') }}">Giỏ hàng</a></li>
                                <li><a href="{{ URL::to('/contact') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">

                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm" />
                                <button style="padding: none"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->



    <section id="slider" class="slider-slictiky">
        <div class="container-fluid">
            <div class="row">
                <div class="main-carousel"
                    data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "adaptiveHeight": true}'>
                    @foreach ($slider as $key => $slide)
                        <div class="carousel-cell" style="position: relative">
                            <img src="{{ asset('/Up_Load/Slide/' . $slide->slider_image) }}" height="100%"
                                width="100%" class="girl img-responsive" alt="" />
                            <div class="col-sm-6" style="position: absolute; text-align: center">
                                <h1> {{ $slide->slider_name }} </h1>
                                <h2> {{ $slide->slider_des }} </h2>
                                <p> {{ $slide->slider_content }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div style="padding-bottom: 20px">
                                <h2>Danh mục hoa quả</h2>
                                @foreach ($category as $catehome)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <li>
                                                    <a
                                                        href="{{ URL::to('/danh-muc-hoa-qua/' . $catehome->category_id) }}">
                                                        {{ $catehome->category_name }}
                                                    </a>
                                                </li>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--/category-products-->

                            <div class="brands_products">
                                <!--brands_products-->
                                <h2>Thương hiệu sản phẩm</h2>
                                @foreach ($brand as $brandhome)
                                    <div class="brands-name">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a
                                                    href="{{ URL::to('/thuong-hieu-hoa-qua/' . $brandhome->brand_id) }}">
                                                    <span class="pull-right">(28)</span>
                                                    {{ $brandhome->brand_name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <!--/brands_products-->

                            <div class="price-range">
                                <!--price-range-->
                                <h2>Lọc giá tiền</h2>
                                <div class="well text-center">
                                    <input type="text" class="span2" value="" data-slider-min="0"
                                        data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                        id="sl2"><br />
                                    <b class="pull-left">0 vnđ</b> <b class="pull-right">800 vnđ</b>
                                </div>
                            </div>
                            <!--/price-range-->

                            <div style="width:100%" class="shipping text-center">
                                <!--shipping-->
                                <img style="width: 100%" src="{{ asset('Up_Load/product/side.jpg') }}"
                                    alt="" />
                            </div>
                            <!--/shipping-->

                            {{-- wishlist --}}
                            <div class="brands_products" style="margin-top: 25px">
                                <h2 style="margin-bottom: 15px">Sản phẩm yêu thích</h2>
                                <div class="brands-name">

                                    <div id="row_wishlist" class="row">

                                    </div>

                                </div>
                            </div>
                            {{-- end-wishlist --}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>

            <div class="row">
                <div class="element">
                    <h2 class="title text-center">Cam kết của chúng tôi</h2>
                    <ul>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/iejknaed.json" trigger="hover"
                                        colors="outline:#000000,primary:#848484,secondary:#a5e830,tertiary:#ebe6ef,quaternary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Bảo vệ người mua</h4>
                                <span>
                                    Cam kết bảo vệ quyền lợi của khách hàng khi mua tất cả sản phẩm tại của hàng
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/ptzvfshs.json" trigger="hover"
                                        colors="outline:#121331,primary:#a5e830,secondary:#eee966"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Giá tốt nhất</h4>
                                <span>
                                    Mức giá phù hợp, khách hàng có thể lựa chọn sản phẩm theo túi tiền
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/osvvqecf.json" trigger="hover"
                                        colors="outline:#000000,primary:#000000,secondary:#ffffff,tertiary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Hỗ trợ 24/7</h4>
                                <span>
                                    Luôn luôn hỗ trợ, tư vấn, giải đáp mọi thắc mắc cho khách hàng 24/7
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/qwzdhaoa.json" trigger="hover"
                                        colors="outline:#000000,primary:#f24c00,secondary:#a66037,tertiary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Chất lượng tốt</h4>
                                <span>
                                    Cam kết về chất lượng sản phẩm, đảm bảo vệ sinh an toàn thực phẩm
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>





                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">Bài viết mới nhất</h2>
                    {{-- <div style="display: flex; justify-content: center">
                        <img decoding="async" width="41" height="41" src="https://demo.webdigify.com/WCM02/WCM055_agriosa/wp-content/uploads/2022/10/title-icon.png" class="attachment-large size-large wp-image-26140" alt="" loading="lazy">
                    </div> --}}

                    <section id="slider" class="slider-slictiky slider-slictiky-post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="main-carousel main-carousel-post"
                                    data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true}'>
                                    @foreach ($all_post as $key => $post)
                                        <div class="carousel-cell carousel-cell-post" style="position: relative">
                                            <div class="wrap-post" style="padding: 0 15px">
                                                <a href="{{ URL::to('details-new/' . $post->post_id) }}">
                                                    <div class="wrap-post-image"
                                                        style="height: 250px; overflow: hidden">
                                                        <img src="{{ asset('/Up_Load/Post/' . $post->post_image) }}"
                                                            height="100%" width="100%" class="girl img-responsive"
                                                            alt="" />
                                                    </div>
                                                </a>
                                                <div class="wrap-post-content">
                                                    <h4> Admin </h4>
                                                    <h5>
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        <span>{{ $post->created_at }}</span>
                                                    </h5>
                                                    <h2>
                                                        <a href="#">
                                                            {{ $post->post_name }}
                                                        </a>
                                                    </h2>
                                                    <p>
                                                        {{ Str::limit($post->post_des, 150, ' ...') }}
                                                    </p>
                                                </div>
                                                <a href="{{ URL::to('details-new/' . $post->post_id) }}">Read
                                                    more...</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Gian hàng chúng tôi</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <ul class="footer-visit" style="display: flex">
                                        <li>
                                            <i style="font-size: 23px; color: #ffffff; padding-right: 15px; position: relative; top: 25%"
                                                class="fa-solid fa-location-dot"></i>
                                        </li>
                                        <li>
                                            <a href="#" style="line-height: 30px">
                                                383 Trần Hưng Đạo, Ninh Khánh, TP Ninh Bình, Ninh Bình
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="footer-visit" style="display: flex; justify-content: flex-start">
                                        <li style="display: flex">
                                            <i style="font-size: 23px; color: #ffffff; padding-right: 15px; position: relative; top: 25%"
                                                class="fa-solid fa-clock"></i>
                                        </li>
                                        <li>
                                            <a style="display: block" href="#">
                                                T2 - T6: 8:00am - 5:00pm
                                            </a>
                                            <a style="display: block" href="#">
                                                T7 - CN: 10:00am - 9:50pm
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Lựa chọn</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Lịch sử</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Phiếu quà tặng</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5 ">
                        <div class="single-widget" style="padding-left: 30px">
                            <h2>Liên hệ với chúng tôi</h2>
                            <form action="#" class="searchform">
                                <div style="background-color: #ffffff; display: flex">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class=" btn-default"
                                        style="display: flex; align-item: center; justify-content: center">
                                        <i class="fa-solid fa-right-long"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="single-widget" style="padding-left: 30px; margin-top: 15px">
                            <h2> Khám phá nông trại của chúng tôi:</h2>
                            <iframe width="100%" height=""
                                src="https://www.youtube.com/embed/rLrV5Tel7zw?start=1" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write;
                             encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2023 DưaHấu - X Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="https://www.facebook.com/thelong.nguyen.3150807/">Caubehayho2k</a></span></p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_oGRSKTcTug63fc5c26bcdcd.js">
        </script>
    </footer>
    <!--/Footer-->


    <script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_oGRSKTcTug63fc5c26bcdcd.js">
    </script>
    <script src="{{ asset('Front_End/js/jquery.js') }}"></script>
    <script src="{{ asset('Front_End/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Front_End/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('Front_End/js/price-range.js') }}"></script>
    <script src="{{ asset('Front_End/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('Front_End/js/main.js') }}"></script>
    <script src="{{ asset('Back_End/js/sweetalert.min.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="zeg0gWPS"></script>




    <script type=text/javascript>
        $(document).ready(function() {
            load_comment();

            function load_comment() { ///Hiển thị bình luận từ db
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/load-comment') }}',
                    method: 'POST',
                    data: {
                        "product_id": product_id,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {

                        $('#comment_show').html(data);
                    }

                });
            }


            $('.send-comment').click(function() { /// gủi bình luận vào db
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var comment_customer_img = $('.comment_customer_img').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/send-comment') }}',
                    method: 'POST',
                    data: {
                        "product_id": product_id,
                        "comment_name": comment_name,
                        "comment_content": comment_content,
                        "comment_customer_img": comment_customer_img,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {

                        $('#notify_comment').html(
                            '<span class="text text-success">Thêm bình luận thành công, đang đợi duyệt</span>'
                            );
                        load_comment();
                        $('#notify_comment').fadeOut(6000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    }

                });
            })





        });
    </script>





    {{-- Thêm sản phẩm yêu thích --}}
    <script type="text/javascript">

        function view() {
            if (localStorage.getItem('data') != null) {
                var data = JSON.parse(localStorage.getItem('data'));

                data.reverse(); // sản phẩm thêm mới lên trên đầu

                document.getElementById('row_wishlist').style.overflow = 'scroll';
                document.getElementById('row_wishlist').style.height = '250px';

                for (i = 0; i < data.length; i++) {
                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;
                    $("#row_wishlist").append(
                        '<div class="row" style="margin-top: 10px 0"><div class=col-md-12 style="margin-bottom: 10px"><div class="col-md-5"><img src="' +
                        image + '" width="100%"></div><div class="col-md-7 info_wishlist"><p>' + name +
                        '</p><p style="color: #FE980F">' +
                        price + '</p><a herf="' + url + '">Đặt hàng</a></div></div></div>');
                }
            }
        }

        view()



        function add_wishlist(clicked_id) {

            var id = clicked_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var image = document.getElementById('wishlist_productimage' + id).src;
            var url = document.getElementById('wishlist_producturl' + id).href;

            var newItem = {
                'url': url,
                'id': id,
                'name': name,
                'price': price,
                'image': image
            }

            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');

            }

            var old_data = JSON.parse(localStorage.getItem('data'));


            var matches = $.grep(old_data, function(obj) {
                return obj.id == id; //so sánh id từ localStorage với id sản phẩm lúc click add yêu thích
            })

            if (matches.length) { //có chiều dài là 1; tại vì chỉ lấy 1 sản phẩm
                alert('Sản phẩm đã được thêm vào yêu thích, không thể thêm lại!');
                // localStorage.removeItem(newItem);
                
                 

                    localStorage.parent().remove('data', 'newItem');

            } else {
                old_data.push(newItem);
                $("#row_wishlist").append(
                    '<div class="row" style="margin-top: 10px 0"><div class=col-md-12 style="margin-bottom: 10px"><a href="' +
                    newItem.url + '"><div class="col-md-5"><img src="' + newItem.image +
                    '" width="100%"></div></a><div class="col-md-7 info_wishlist"><p>' + newItem.name +
                    '</p><p style="color: #FE980F">' +
                    newItem.price + '</p><a href="' + newItem.url + '">Đặt hàng</a></div></div></div>');

            }

            localStorage.setItem('data', JSON.stringify(old_data));
        }
    </script>




    {{-- cart ajax --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val()
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: '{{ url('/add-cart-ajax') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_quantity: cart_product_quantity,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        // alert(data);
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/giohang') }}";
                            });

                    }

                });
            })
        });
    </script>


    {{-- Tính phí vận chuyển blade: show_checkout --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }

                $.ajax({
                    url: '{{ url('/select-delivery-home') }}',
                    method: 'POST',
                    data: {
                        "action": action,
                        "ma_id": ma_id,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>

    {{-- Click tính phi vận chuyển show_check_out --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.caculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();

                //    console.log(matp);
                //    console.log(maqh);
                //    console.log(xaid);

                if (matp == "" && maqh == "" && xaid == "") {
                    alert('vui lòng chọn địa chỉ!!!');
                } else {
                    $.ajax({
                        url: '{{ url('/caculate-fee') }}',
                        method: 'POST',
                        data: {
                            "matp": matp,
                            "maqh": maqh,
                            "xaid": xaid,
                            "_token": _token,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function() {
                            location.reload();

                        }
                    });
                }
            })
        })
    </script>


    {{-- Gửi thông tin check_out vào chi tiết đơn hàng --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.send_order').click(function() {
                swal({
                        title: "Xác nhận mua hàng",
                        text: "Đơn hàng sẽ không được hoàn trả khi đã xác nhận, bạn có muốn tiệp tục đặt hàng không? ",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Đồng ý",

                        cancelButtonText: "Hủy bỏ",
                        closeOnConfirm: false,
                        closeOnConfirm: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url: '{{ url('/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_notes: shipping_notes,
                                    shipping_method: shipping_method,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    _token: _token
                                },
                                success: function() {
                                    swal("Đơn hàng",
                                        "Đơn hàng của bản đã đã gửi thành công ",
                                        "success");
                                }

                            });
                            window.setTimeout(() => {
                                location.reload();
                            }, 3000);

                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, vui lòng suy nghĩ lại", "error");
                        }
                    });
            })
        });
    </script>

</body>

</html>
