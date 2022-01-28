@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="ml-3">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
  <form action="{{ route('admin.customers.customer-create') }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tên khách hàng</label>
      <input type="text" name="customer_name" class="form-control" placeholder="Nhập tên khách hàng..."
        value="{{ old('customer_name') }}">
      @error('customer_name')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Số điện thoại</label>
      <input type="text" name="customer_phone" class="form-control" placeholder="Nhập số điện thoại..."
        value="{{ old('customer_phone') }}">
      @error('customer_phone')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Email</label>
      <input type="email" name="customer_email" class="form-control" placeholder="Ví dụ email: abc@gmail.com"
        value="{{ old('customer_email') }}">
      @error('customer_email')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Mật khẩu đăng nhập</label>
      <input type="password" name="customer_pass" class="form-control" placeholder="Nhập mật khẩu..."
        value="{{ old('customer_pass') }}">
      @error('customer_pass')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
      <div class="d-flex justify-content-start justify-content-lg-start align-items-center">
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_gender" value="Nam" type="checkbox" role="switch" checked>
          <label class="form-check-label-label" for="flexSwitchCheckDefault">Nam</label>
        </div>
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_gender" value="Nữ" type="checkbox" role="switch">
          <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Nữ</label>
        </div>
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_gender" value="Khác" type="checkbox" role="switch">
          <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Khác</label>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_customer" class="btn btn-primary btn-block">Thêm mới</button>
    </div>

  @csrf
  </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $('.form-check-input').on('click', function() { 
    $('.form-check-input').prop('checked', false);
    this.checked = true; 
  });
</script>
@endsection