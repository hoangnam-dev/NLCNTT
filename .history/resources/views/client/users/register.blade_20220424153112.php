@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
<form action="{{ route('client.user.register') }}" method="POST">
    @csrf

    <h3 class="text-center text-dark mb-4">Đăng ký tài khoản</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    @if(session('status'))
        <p class="mb-3 alert alert-{{ session('status') }}">{{ session('message') }}</p>
    @endif
    <div class="form-group">
        <input type="text" class="form-control item" name="user_name" value="{{ old('user_name') }}" placeholder="Họ tên khách hàng">
        @error('user_name')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" name="user_password" value="{{ old('user_password') }}" placeholder="Mật khẩu">
        @error('user_password')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="user_email" value="{{ old('user_email') }}" placeholder="Email">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="user_phone" value="{{ old('user_phone') }}" placeholder="Số điện thoại">
        @error('user_phone')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- <div class="form-group">
        <input type="text" class="form-control item" name="user_address" value="{{ old('user_address') }}" placeholder="Địa chỉ">
        @error('user_address')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div> --}}
    <div class="form-group">
        <button type="submit" class="btn btn-block btnSubmit">Đăng ký</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.home') }}" class="btn btn-block btnBack">Trở lại</a>
    </div>
    <div class="form-group">
        <h6>Bạn đã có tài khoản?&nbsp;<a href="{{ route('client.user.login') }}" class="text-danger">Đăng nhập</a></h6>
    </div>
</form>
@endsection