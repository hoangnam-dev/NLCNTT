@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
<form action="{{ route('user.register') }}" method="POST">
    @csrf

    <h3 class="text-center text-dark">Đăng ký tài khoản</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    @if(session('status'))
        <p class="mb-3 alert alert-{{ session('status') }}">{{ session('message') }}</p>
    @endif
    <div class="form-group">
        <input type="text" class="form-control item" name="user_name" value="{{ old('user_name') }}" placeholder="Username">
        @error('user_name')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" name="user_password" value="{{ old('user_password') }}" placeholder="Password">
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
        <input type="text" class="form-control item" name="user_phone" value="{{ old('user_phone') }}" placeholder="Phone Number">
        @error('user_phone')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="user_address" value="{{ old('user_address') }}" placeholder="Address">
        @error('user_address')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btnSubmit">Create Account</button>
    </div>
    <div class="form-group">
        <h6>You have account?&nbsp;<a href="{{ route('user.login') }}" class="text-danger">Sign In</a></h6>
    </div>
</form>
@endsection