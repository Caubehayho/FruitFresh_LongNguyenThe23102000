<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .wrap-coupon{
            width: 100%;
            height: 480px;
            background-color: white;
            display: flex;
            justify-content: center;
            background-image: url('https://www.freepik.com/premium-vector/nature-food-leaves-concepts-background_31746336.htm#query=fruit%20background&position=35&from_view=keyword&track=ais');
    
        }
        .coupon{
           
            width: 700px;
            height: 300px;
            background-color: #44a41b;
            border: 3px solid #7fb966;
            border-style: dotted;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="wrap-coupon">
        <div class="coupon">
            <div class="container">
                <h3 style="color: white; padding: 5px 20px">Mã khuyến mãi từ shop:<a style="color: white" href="#">Minh&TrangFruit.vn</a></h3>
            </div>
            <div class="container" style="background-color: white; padding: 5px 20px">
                <h2 class="note" style="text-align: center">
                    <b><i>
                        @if($coupon['coupon_condition']==1)
                            Giảm {{$coupon['coupon_number']}}%
                        @else
                        Giảm {{number_format($coupon['coupon_number'],0,',','.')}} vnđ 
                        @endif
                          trên tổng đơn hàng đặt mua
                    </i></b>
                </h2>
                <p>Quý khách đã từng mua hàng tại shop<a href="#">Minh&TrangFruit.vn</a> nếu đã có tài khoản xin vui lòng
                <a href="#" style="color: red">đăng nhập</a> vào tài khoản để mua hàng và nhập mã code phía dưới để được giảm giá
                khi mua hàng, xin cảm ơn quý khách. Kính chúc quý khách thật nhiều sức khỏe và bình an trong cuộc sống. </p>
            </div>
            <div class="container" style=" padding: 0px 20px; color: white">
                <p class="code">Sử dụng Code sau: <span class="promo"><i><strong>{{$coupon['coupon_code']}}</strong></i></span> chỉ với <i><strong>{{$coupon['coupon_time']}}</strong></i> mã giảm giá, nhanh tay kẻo bỏ lỡ nhé</p>
                <p class="expire">Ngày bắt đầu : {{$coupon['start_coupon']}} / Ngày kết thúc : {{$coupon['end_coupon']}}</p>
            </div>
        </div>
    </div>
</body>
</html>