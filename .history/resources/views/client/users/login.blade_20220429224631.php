@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
@if (session('status'))
    <div class="alert alert-session('status')">
        {{ session('message') }}
    </div>
@endif
<form action="{{ route('client.user.login') }}" method="POST">
    @csrf
    @method('POST')

    <h3 class="text-center text-dark mb-4">Đăng nhập</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    @if(session('error'))
      <p class="mb-3 alert alert-danger">{{ session('error') }}</p>
    @endif
    <div class="form-group">
        <input type="text" name="user_email" class="form-control item" value="{{ old('user_email') }}" placeholder="Email">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="user_password" class="form-control item" value="{{ old('user_password') }}" placeholder="Password">
        @error('user_password')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btnSubmit">Đăng nhập</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.home') }}" class="btn btn-block btnBack">Trở lại</a>
    </div>
    <div class="form-group">
        <h6>Bạn chưa có tài khoản?&nbsp;<a href="{{ route('client.user.register') }}" class="text-danger">Đăng ký</a></h6>
        <a class="reset-password-link" href="{{ route('client.user.reset-password') }}">Quên mật khẩu</a>
    </div>

</form>
@endsection