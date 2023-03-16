<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dưa Hấu X</title>
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
                                $shipping_id = Session::get('shipping_id');
                                // dd( $shipping_id);

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
                                    <a href="{{ URL::to('/profile') }}"><i class="fa-solid fa-user"></i>profile</a>
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
                                <button style="padding: none"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm" />
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
                <div class="col-sm-12 padding-right">
                    <div class="container bootstrap snippets bootdey">
                        <h1 class="text-default" style="color:#44a41b ">Chỉnh sửa thông tin</h1>
                          <hr>
                          @foreach ($user_profile as $user)
                                <form  action="{{ URL::to('/update-profile/'.$user->customer_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-3">
                                            <div class="text-center">
                                            <img src="{{asset('/Up_Load/Profile/'. $user->customer_img)}}" style="width: 200px; " class="avatar img-circle img-thumbnail" alt="avatar">
                                            <h6>Tải lên ảnh khác...</h6>
                                            
                                            <input type="file" name="customer_img" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <!-- edit form column -->
                                        <div class="col-md-9 personal-info">
                                        
                                            
                                            <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Họ tên:</label>
                                                <div class="col-lg-9">
                                                <input class="form-control" name="customer_name" type="text" value="{{$user->customer_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top: 50px">
                                                <label class="col-lg-3 control-label">Email:</label>
                                                <div class="col-lg-9">
                                                <input class="form-control" disabled="true"  name="customer_email" type="email" value="{{$user->customer_email}}">
                                                </div>
                                            </div>
                                            <div class="form-group"  style="margin-top: 100px">
                                                <label class="col-lg-3 control-label">Địa chỉ:</label>
                                                <div class="col-lg-9">
                                                <input class="form-control" name="customer_address" type="text" value="{{$user->customer_address}}">
                                                </div>
                                            </div>
                                            <div class="form-group"  style="margin-top: 150px">
                                                <label class="col-lg-3 control-label">Phone:</label>
                                                <div class="col-lg-9">
                                                <input class="form-control" name="customer_phone" type="text" value="{{$user->customer_phone}}">
                                                </div>
                                            </div>
                                            <div style="margin-top: 200px; text-align: right">
                                               <div class="col-lg-12">
                                                <button class="btn btn-default check_out" style="padding: 5px 10px" type="submit">Cập nhật</button>
                                               </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>
                          @endforeach
                    </div>
                    <hr>
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
                            <h2> Khám phá trang trại của chúng tôi:</h2>
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

    </footer>
    <!--/Footer-->



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
