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
                        <!--login form-->
                        <h2>Điền email để lấy lại mật khẩu</h2>
                        <form action="{{ URL('/recover-pass') }}" method="POST">
                            @csrf
                            <input type="text" name="email_account" placeholder="Nhập vào email..." />
                            <button type="submit" class="btn btn-default">Gửi</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
