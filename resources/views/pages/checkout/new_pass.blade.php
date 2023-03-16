@extends('master')
@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="login-form">
                        @php                          
                            $email = $_GET['email']; 
                            $token = $_GET['token'];     
                        @endphp
                        <h2>Điền mật khẩu mới</h2>
                        <form action="{{ URL('/reset-new-pass') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{$email}}"/>
                            <input type="hidden" name="token" value="{{$token}}"/>                          
                            <input type="text" name="password_account" placeholder="Nhập mật khẩu mới" />
                            <button type="submit" class="btn btn-default">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
