@extends('client.layouts.master2')
@section('title')
{{ $title }}
@endsection
@section('form-content')

@if (!session('confirm_email'))
<form action="{{ route('client.user.reset-password') }}" method="POST">
    @csrf
    @method('POST')

    <h3 class="text-center text-dark mb-4">Xác nhận Email</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <p>Bạn hãy nhập vào <strong>Email</strong> đã ký tài khoản. Chúng tôi sẽ gửi mã xác nhận đến email đó.</p>
    </div>
    <div class="form-group">
        <input type="text" name="customer_email" class="form-control item" value="{{ old('customer_email') }}"
            placeholder="Email">
        @error('customer_email')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block confirm_email">Xác nhận</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.user.login') }}" class="btn btn-block btnBack">Về Trang đăng nhập</a>
    </div>
</form>
@else
<form action="{{ route('client.user.reset-password') }}" method="post">
    @csrf
    @method('POST')

    <h3 class="text-center text-dark mb-4">Nhập mã xác nhận</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <p>Bạn hãy nhập vào mã xác nhận đã được gửi tới email <strong>Email</strong>\.</p>
    </div>
    <div class="form-group">
        <input type="password" name="verification" class="form-control item" value="{{ old('verification') }}"
            placeholder="Email">
        @error('verification')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btnSubmit">Xác nhận</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.user.login') }}" class="btn btn-block btnBack">Hủy</a>
    </div>
</form>
@endif

@endsection