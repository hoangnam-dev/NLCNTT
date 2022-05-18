@extends('client.layouts.master2')
@section('title')
{{ $title }}
@endsection
@section('form-content')


<form action="{{ route('client.user.reset-password') }}" method="post">
    @csrf
    @method('PUT')

    <h3 class="text-center text-dark mb-4">Đặt lại mật khẩu</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <input type="password" name="verification" class="form-control item" value="{{ old('verification') }}"
            placeholder="Mật khẩu mới">
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


@endsection