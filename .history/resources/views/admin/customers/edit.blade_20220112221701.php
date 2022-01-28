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
  <form action="{{ route('admin.customers.customer-edit', ['MaKH'=>$customer->MaKH]) }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tên khách hàng</label>
      <input type="text" name="customer_name" class="form-control" placeholder="Nhập tên khách hàng..."
        value="{{ $customer->TenKH }}">
      @error('customer_name')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Số điện thoại</label>
      <input type="text" name="customer_phone" class="form-control" placeholder="Nhập số điện thoại..."
        value="{{ $customer->SoDienThoai }}">
      @error('customer_phone')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Email</label>
      <input type="email" name="customer_email" class="form-control" placeholder="Ví dụ email: abc@gmail.com"
        value="{{ $customer->Email }}">
      @error('customer_email')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Mật khẩu đăng nhập</label>
      <div class="input-group-append">
        <input id="pass" type="password" name="customer_pass" class="form-control" placeholder="Nhập mật khẩu..."
        value="{{ $customer->MatKhau }}">
        <div class="input-group-text showPass">
          <span id="show" class="fas fa-eye"></span>
        </div>
      </div>
      @error('customer_pass')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
      <div class="d-flex justify-content-start justify-content-lg-start align-items-center">
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_sex" value="Nam" type="checkbox" role="switch" {{ $customer->GioiTinh=='Nam'?'checked':'' }}>
          <label class="form-check-label-label" for="flexSwitchCheckDefault">Nam</label>
        </div>
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_sex" value="Nữ" type="checkbox" role="switch" {{ $customer->GioiTinh=='Nữ'?'checked':'' }}>
          <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Nữ</label>
        </div>
        <div class="form-check form-switch mr-4">
          <input class="form-check-input" name="customer_sex" value="Khác" type="checkbox" role="switch" {{ $customer->GioiTinh=='Khác'?'checked':'' }}>
          <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Khác</label>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_customer" class="btn btn-primary btn-block">Cập nhật</button>
    </div>

  @csrf
  @method('PUT')
  </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $('.form-check-input').on('click', function() { 
    $('.form-check-input').prop('checked', false);
    this.checked = true; 
  });
  $('.showPass').on('click', function() {
    if('password' == $('#pass').attr('type')){
         $('#pass').prop('type', 'text');
         $('#show').addClass('fa-eye-slash');
    }else{
         $('#pass').prop('type', 'password');
         $('#show').removeClass('fa-eye-slash');
    }
  });
</script>
@endsection