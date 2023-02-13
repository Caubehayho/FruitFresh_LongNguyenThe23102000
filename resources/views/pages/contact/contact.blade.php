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
                                    src="{{ asset('Back_End/image/logoduahau6.png') }}"alt="" />
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
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ URL::to('/news') }}">Tin tức</a>
                                </li>
                                <li><a href="{{ URL::to('/giohang') }}">Giỏ hàng</a></li>
                                <li><a href="{{ URL::to('/contact')}}">Liên hệ</a></li>
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


    <section id="slider" class="slider-slictiky">
        <div class="container-fluid">
            <div class="row">
                <div class="main-carousel"
                    data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "adaptiveHeight": true, "autoPlay": 3000}'>
                    <div class="carousel-cell" style="position: relative">
                        <img style="width: 100%" src="{{ URL::to('/Up_Load/Slide/slide1.jpg') }}"
                            class="girl img-responsive" alt="" />
                        <div class="col-sm-6" style="position: absolute; text-align: center">
                            <h1> Dưa hấu - x </h1>
                            <h2> Hoa quả xanh thiên nhiên </h2>
                            <p> Mang chất dinh dưỡng đến với mọi người </p>
                        </div>
                    </div>
                    <div class="carousel-cell " style="position: relative">
                        <img style="width: 100%" src="{{ URL::to('/Up_Load/Slide/slide2.jpg') }}"
                            class="girl img-responsive" alt="" />
                        <div class="col-sm-6" style="position: absolute; text-align: center">
                            <h1> Dưa hấu - x </h1>
                            <h2> Hoa quả xanh thiên nhiên </h2>
                            <p> Mang chất dinh dưỡng đến với mọi người </p>
                        </div>
                    </div>
                    <div class="carousel-cell" style="position: relative">
                        <img style="width: 100%" src="{{ URL::to('/Up_Load/Slide/slide6.jpg') }}"
                            class="girl img-responsive" alt="" />
                        <div class="col-sm-6" style="position: absolute; text-align: center">
                            <h1> Dưa hấu - x </h1>
                            <h2> Hoa quả xanh thiên nhiên </h2>
                            <p> Mang chất dinh dưỡng đến với mọi người </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div id="contact-page" class="container">
                        <div class="bg">
                            <div class="row">    		
                                <div class="col-sm-12">    			   			
                                    <h2 class="title text-center"><strong>Liên hệ với chúng tôi</strong></h2>    			    				    				
                                    <div id="gmap" class="contact-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20274.48251057591!2d105.94835020360753!3d20.26979824885619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313679cd26a46f65%3A0x308e66ee30caf0bc!2zTUlOSCBUUkFORyBGUlVJVCAtIEhvYSBxdeG6oyBuaOG6rXAga2jhuql1IGNhbyBj4bqlcA!5e0!3m2!1svi!2sus!4v1676211967473!5m2!1svi!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>			 		
                            </div>    	
                            <div class="row">  	
                                {{-- <div class="col-sm-8">
                                    <div class="contact-form">
                                        <h2 class="title text-center">Get In Touch</h2>
                                        <div class="status alert alert-success" style="display: none"></div>
                                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                                            </div>                        
                                            <div class="form-group col-md-12">
                                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <div class="col-sm-12">
                                    <div class="contact-info">
                                        <h2 class="title text-center">Thông tin liên hệ</h2>
                                        <address>
                                            <p>Dưa Hấu - X : Fruit-Fresh</p>
                                            <p>383 Trần Hưng Đạo, Ninh Khánh, Ninh Bình, 430000, Việt Nam</p>
                                            <p>Thành phố Ninh Bình, Ninh Bình</p>
                                            <p>Mobile: +84 086 741 823</p>
                                            <p>Fax: 1-714-252-0026</p>
                                            <p>Email: longvanh2000@gmail.com</p>
                                        </address>
                                        <div class="social-networks">
                                            <h2 class="title text-center">Mạng xã hội</h2>
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    			
                            </div>  
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        {{-- <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="companyinfo">
                            <img src="" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                                                Ngõ 180, đường Z115, Tân Thịnh, Thái Nguyên
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
</body>

</html>
