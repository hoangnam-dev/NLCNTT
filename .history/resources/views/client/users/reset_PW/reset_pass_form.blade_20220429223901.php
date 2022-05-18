@extends('client.layouts.master2')
@section('title')
{{ $title }}
@endsection
@section('form-content')


<form action="{{ route('client.user.reset-password-form') }}" method="POST">
    @csrf
    @method('PUT')

    <h3 class="text-center text-dark mb-4">Đặt lại mật khẩu</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <input type="hidden" name="email" value="{{ $customer->email }}">
    <div class="form-group">
        <input type="password" name="new_password" class="form-control item" value="{{ old('new_password') }}"
            placeholder="Mật khẩu mới">
        @error('new_password')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password_confirm" class="form-control item" value="{{ old('password_confirm') }}"
            placeholder="Mật khẩu mới">
        @error('password_confirm')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" name="reset_passowrd" class="btn btn-block btnSubmit">Xác nhận</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.user.login') }}" class="btn btn-block btnBack">Hủy</a>
    </div>
</form>


@endsection