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
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="form-group">
        <input type="email" name="customer_email" class="form-control item" value="{{ old('customer_email') }}"
            placeholder="Email">
        @error('customer_email')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" name="confirm_email" class="btn btn-block btnSubmit">Xác nhận</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.user.login') }}" class="btn btn-block btnBack">Về Trang đăng nhập</a>
    </div>
</form>
@elseif (session('confirm_email'))
<form action="{{ route('client.user.reset-password-form') }}" method="post">
    @csrf
    @method('POST')

    <h3 class="text-center text-dark mb-4">Nhập mã xác nhận</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <p>Bạn hãy nhập vào mã xác nhận đã được gửi tới email <strong>{{ $customer->email }}</strong>\.</p>
    </div>
    <input type="hidden" name="email_reset" value="{{ $customer->email }}">
    <div class="form-group">
        <input type="text" name="verification_code" class="form-control item" value="{{ old('verification_code') }}"
            placeholder="Email">
        @error('verification_code')
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