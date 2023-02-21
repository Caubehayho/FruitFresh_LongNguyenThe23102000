<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="XedlZUiJ96qvrZagebz0w613mC9y6MpUnEIvdaWZ">
    <title>@yield('title')</title>

    <link href="{{ asset('Back_End/image/logoduahau.png') }}" rel="icon" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel-bs4" />

    <meta name="keywords"
        content="creative tim, updivision, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, laravel dashboard, bootstrap 4, laravel, css3 dashboard, bootstrap 4 admin, argon laravel dashboard, bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, argon laravel design, argon laravel dashboard bootstrap">
    <meta name="description"
        content="Argon Laravel Dashboard is a beautiful Bootstrap 4 & Laravel admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

    <meta itemprop="name" content="Argon Dashboard Laravel - Frontend Preset for Laravel">
    <meta itemprop="description"
        content="Argon Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components built by Creative Tim & UPDIVISION. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta itemprop="image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/140/original/opt_ad_laravel_thumbnail.jpg?1548334671">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon Dashboard Laravel - Frontend Preset for Laravel">
    <meta name="twitter:description"
        content="Argon Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components built by Creative Tim & UPDIVISION. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/140/original/opt_ad_laravel_thumbnail.jpg?1548334671">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Dashboard Laravel - Frontend Preset for Laravel" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://argon-dashboard-laravel-bs4.creative-tim.com/" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/140/original/opt_ad_laravel_thumbnail.jpg?1548334671" />
    <meta property="og:description"
        content="Argon Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components built by Creative Tim & UPDIVISION. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim & UPDIVISION" />

    <link href="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/nucleo/css/nucleo.css"
        rel="stylesheet">
    <link
        href="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        rel="stylesheet">
    {{-- <link type="text/css" href="{{asset('BackEnd/css/style.css')}}" rel="stylesheet"> --}}

    <link type="text/css" href="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/css/argon.css?v=1.0.0"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/5bf87cd97a.js" crossorigin="anonymous"></script>



</head>

<body class="">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <form id="logout-form" action="https://argon-dashboard-laravel-bs4.creative-tim.com/logout" method="POST"
        style="display: none;">
        <input type="hidden" name="_token" value="XedlZUiJ96qvrZagebz0w613mC9y6MpUnEIvdaWZ">
    </form>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand pt-0" href="{{ URL::to('/dashboard') }}">
                <img style="max-height: 3.5rem;" src="{{ asset('Back_End/image/logoduahau.png') }}"
                    class="navbar-brand-img" alt="...">
                <span class="h4 mb-0 text-black text-uppercase d-none d-lg-inline-block">DUAHAU-X</span>
            </a>

            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('Back_End/image/avatarduahau.jpg') }}">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">
                                    <?php
                                    $name = session()->get('admin_name');
                                    if ($name) {
                                        echo $name;
                                        $name = session()->put('admin_name', '');
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Chào mừng!</h6>
                        </div>
                        <a href="https://argon-dashboard-laravel-bs4.creative-tim.com/profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Thông tin cá nhân</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Cài đặt</span>
                        </a>
                        {{-- <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a href="https://argon-dashboard-laravel-bs4.creative-tim.com/logout" class="dropdown-item"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="https://argon-dashboard-laravel-bs4.creative-tim.com/home">
                                <img
                                    src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main"
                                aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ URL::to('dashboard') }}">
                            <i class="fa-solid fa-tv"></i> Bảng điều khiển
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-dashboards" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-dashboards">
                            <i class="fa-solid fa-carrot"></i>
                            <span class="nav-link-text">Đơn hàng</span>
                        </a>
                        <div class="collapse" id="navbar-dashboards" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item active">
                                    <a href="{{ URL::to('/manage-order') }}" class="nav-link">Quản lý đơn hàng</a>
                                </li>
                                {{-- <li class="nav-item ">
                                        class="nav-link">Alternative</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar">
                            <i class="fa-solid fa-carrot"></i>
                            <span class="nav-link-text">Bài viết</span>
                        </a>
                        <div class="collapse" id="navbar" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item active">
                                    <a href="{{ URL::to('/add-post') }}" class="nav-link">Thêm bài viết</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ URL::to('/all-post') }}" class="nav-link">Tất cả bài viết</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active collapsed" href="#navbar-examples" data-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fab fa-laravel"></i>
                            <span class="nav-link-text">Mã giảm giá</span>
                        </a>
                        <div class="collapse" id="navbar-examples" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('/insert-coupon') }}">
                                        Quản lý mã giảm giá
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('/list-coupon') }}">
                                        Tất cả mã giảm giá
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#navbar" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar">
                            <i class="fab fa-laravel"></i>
                            <span class="nav-link-text">Vận chuyển</span>
                        </a>
                        <div class="collapse" id="navbar" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('/delivery') }}">
                                        Quản lý vận chuyển
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{URL::to('/list-coupon')}}">
                                        Tất cả mã giảm giá
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="#navbar-forms" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <i class="fa-brands fa-slack"></i>
                            <span class="nav-link-text">Danh mục hoa quả</span>
                        </a>
                        <div class="collapse" id="navbar-forms" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item ">
                                    <a href="{{ route('category_product_addfruit') }}" class="nav-link"> Thêm danh
                                        mục</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('category_product_listfruit') }}" class="nav-link">Tất cả danh
                                        mục</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="#navbar-pages" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-pages">
                            <i class="fa-solid fa-copyright"></i>
                            <span class="nav-link-text">Thương hiệu</span>
                        </a>
                        <div class="collapse " id="navbar-pages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item ">
                                    <a href="{{ route('product_addbrand') }}" class="nav-link">Thêm thương hiệu </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('product_listbrand') }}" class="nav-link">Tất cả thương
                                        hiệu</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-tables">
                            <i class="fa-solid fa-hippo"></i>
                            <span class="nav-link-text">Sản phẩm</span>
                        </a>
                        <div class="collapse" id="navbar-tables" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item ">
                                    <a href="{{ route('product_add') }}" class="nav-link">Thêm sản phẩm</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('product_list') }}" class="nav-link">Tất cả sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button"
                            aria-expanded="" aria-controls="navbar-maps">
                            <i class="fa-solid fa-spider"></i>
                            <span class="nav-link-text">Slider</span>
                        </a>
                        <div class="collapse " id="navbar-maps">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item ">
                                    <a href="{{ URL::to('/add-slider') }}" class="nav-link">Thêm slide</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ URL::to('/manage-slider') }}" class="nav-link">Quản lý slide</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>



            </div>
        </div>
    </nav>
    <div class="main-content">

        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">

                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">
                    @yield('title')
                </a>


                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="{{ asset('Back_End/image/avatarduahau.jpg') }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">
                                        <?php
                                        $name = session()->get('admin_name');
                                        if ($name) {
                                            echo $name;
                                            $name = session()->put('admin_name', '');
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0"></h6>
                            </div>
                            <a href="https://argon-dashboard-laravel-bs4.creative-tim.com/profile"
                                class="dropdown-item">
                                <i class="fa-solid fa-user"></i>
                                <span>Thông tin cá nhân</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('Admin.SignOut') }}" class="dropdown-item">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                @yield('Admin.Dashboard')
            </div>
        </div>
        <div class="container-fluid mt--7">

        </div>
    </div>
    <script src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/jquery/dist/jquery.min.js"></script>
    <script
        src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/vendor/chart.js/dist/Chart.extension.js">
    </script>

    <script src="https://argon-dashboard-laravel-bs4.creative-tim.com/argon/js/argon.js?v=1.0.0"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7811a966298787f6","version":"2022.11.3","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}'
        crossorigin="anonymous"></script>
    {{-- validator-form --}}
    {{-- <script src="{{ asset('public/Back_End/js/jquery.form-validator.min.js') }}"></script>
    <script type="text/javascript">
        $.validate({

        });
    </script> --}}

    {{-- Button cập nhật view_order --}}
    <script type="text/javascript">
        $('.update_quantity_order').click(function(){
            var order_product_id = $(this).data('product_id'); 
            var order_qty = $('.order_qty_'+order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: '{{ url('/update-qty') }}',
                    method: 'POST',
                    data: {
                        "order_product_id": order_product_id,
                        "order_qty": order_qty,
                        "order_code": order_code,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        alert('Cập nhật số lượng sản phẩm đơn hàng thành công')
                        location.reload();
                    }
                });

        });
    </script>



    {{-- Quản lý hàng tồn view_order --}}
    <script type="text/javascript">
        $('.order_details').change(function(){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr('id');
            var _token = $('input[name="_token"]').val();

            //lay ra so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function(){
                quantity.push($(this).val());
            });

            //lay ra product id
            order_product_id=[];
            $("input[name='order_product_id']").each(function(){
                order_product_id.push($(this).val());
            });

            j=0;
            for(i=0; i<order_product_id.length; i++){
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                // alert(order_qty_storage);

                if(parseInt(order_qty)>parseInt(order_qty_storage)){
                    j = j + 1;
                    if(j==1){
                        alert('Vui lòng kiểm tra lại số lượng sản phẩm!')
                    }
                    $('.color_qty_'+order_product_id[i]).css('background','#F5F5ED');
                    
                }
            }
            if(j==0){
                $.ajax({
                    url: '{{ url('/update-order-qty') }}',
                    method: 'POST',
                    data: {
                        "order_status": order_status,
                        "order_id": order_id,
                        "quantity": quantity,
                        "order_product_id": order_product_id,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        alert('Cập nhật trạng thái đơn hàng thành công')
                    location.reload();
                    }
                });
            }

        });
    </script>





    {{-- Ajax Vận chuyển tỉnh thành phố --}}
    <script type="text/javascript">
        $(document).ready(function() {

            fetch_delivery();

            function fetch_delivery(){  //lấy dữ liệu:thông tin phí ship các tỉnh ra bằng ajax
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/select-feeship') }}',
                    method: 'POST',
                    data: {
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#load_delivery').html(data); //html(data): gửi ra tất cả data của /select-feeship nhả về #load_delivery để laod ra
                    }
                });
            }
            


            $(document).on('blur','.fee_feeship_edit', function(){
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/update-delivery') }}',
                    method: 'POST',
                    data: {
                        "feeship_id": feeship_id,
                        "fee_value": fee_value,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                })
            });




            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                // alert(city);
                // alert(province);
                // alert(wards);
                // alert(fee_ship);
                $.ajax({
                    url: '{{ url('/insert-delivery') }}',
                    method: 'POST',
                    data: {
                       " city": city,
                        "province": province,
                        "wards": wards,
                        "fee_ship": fee_ship,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });
            });


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
                    url: '{{ url('/select-delivery') }}',
                    method: 'POST',
                    data: {
                       " action": action,
                        "ma_id": ma_id,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>

</body>

</html>
