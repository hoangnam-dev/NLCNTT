@extends('admin.layouts.master1')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="card-body register-card-body">
    <p class="login-box-msg">Đăng ký</p>

    <form action="#" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Họ tên">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mật khẩu">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                        Tôi đồng ý với <a href="#">điều khoản</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <a href="{{ route('admin.login') }}" class="text-center">Đã có tài khoản</a>
</div>
@endsection