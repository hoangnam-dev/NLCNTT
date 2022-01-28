@extends('admin.layouts.master1')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="card-body login-card-body">
  <p class="login-box-msg">Đăng nhập để truy cập trang quản lý</p>
  @if(session('notify'))
      <p class="mb-3 alert alert-danger">{{ session('notify') }}</p>
    @endif

  <form action="{{ route('admin.login') }}" method="POST">
    @csrf
    @method('POST')

    <div class="input-group mb-3">
      <input type="email" name="adm_email" class="form-control" value="{{ old('adm_email') }}" placeholder="Email...">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    @error('adm_email')
      <p class="mb-2 text-danger">{{ $message }}</p>
    @enderror
    <div class="input-group mb-3">
      <input type="password" name="adm_password" class="form-control" value="{{ old('adm_password') }}" placeholder="Mật khẩu...">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    @error('adm_password')
      <p class="mb-2 text-danger">{{ $message }}</p>
    @enderror
    <div class="row">
      <div class="col-6">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">
            Nhớ mật khẩu
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
{{-- 
  <p class="mb-1">
    <a href="#">Quên mật khẩu</a>
  </p> --}}
  {{-- <p class="mb-1">
    <a href="{{ route('admin.register') }}">Đăng ký</a>
  </p> --}}
</div>
<!-- /.login-card-body -->
@endsection
