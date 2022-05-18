@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
{{-- @section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Thêm sản phẩm</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Produts</a></li>
      <li class="breadcrumb-item active">Thêm sản phẩm</li>
    </ol>
  </div>
</div>
@endsection --}}
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="ml-3">
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.users.admin-create') }}" method="POST">
          @csrf
          {{-- @method('POST') --}}


          <div class="mb-3">
            <label class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name="adm_name" value="{{ old('adm_name') }}" placeholder="Nhập tên nhân viên...">
          </div>
          @error('adm_name')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" name="adm_phone" class="form-control" value="{{ old('adm_phone') }}" placeholder="Số điện thoại...">
          </div>
          @error('adm_phone')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Địa chỉ</label>
            <input type="text" name="adm_address" class="form-control" value="{{ old('adm_address') }}" placeholder="Địa chỏ...">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="adm_email" class="form-control" value="{{ old('adm_email') }}" placeholder="Nhập Email..." autocomplete="off">
          </div>
          @error('adm_email')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="name" class="form-label">Mật khẩu đăng nhập</label>
            <div class="input-group-append">
              <input type="password" name="adm_password" class="form-control" autocomplete="off" placeholder="Nhập mật khẩu..." value="{{ old('adm_password') }}">
              <div class="input-group-text showpasswd">
                <i id="show" class="fas fa-eye-slash"></i>
              </div>
            </div>
          </div>
          @error('adm_password')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="name" class="form-label">Nhập lại mật khẩu</label>
            <div class="input-group-append">
              <input type="password" name="reenter_pass" autocomplete="off" class="form-control" placeholder="Nhập lại mật khẩu..." value="{{ old('reenter_pass') }}">
              <div class="input-group-text  showpasswd">
                <i id="show" class="fas fa-eye-slash"></i>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
            <select class="form-control form-select d-block" name="category_id">
              <option value="1">Nam</option>
              <option value="2">Nữ</option>
            </select>
          </div>
          <!-- /.col -->
          <div class="col-2 mb-3">
            <button type="submit" name="prd_add_submit" class="btn btn-primary btn-block">Thêm mới</button>
          </div>
          <!-- /.col -->
        </form>
      </div>
    </div>
  </div>
  @include('admin.blocks.addAddress')
@endsection
@section('js')
<script type="text/javascript">
  $('.form-check-input').on('click', function() { 
    $('.form-check-input').prop('checked', false);
    this.checked = true; 
  });
  $('.form-check-input').on('click', function() { 
    $('.form-check-input').prop('checked', false);
    this.checked = true; 
  });
  $('.showpasswd').on('click', function() {
    if($(this).children('i').hasClass('fa-eye-slash')){
      $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
      $(this).prev().attr('type','text');
    }else{
      $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
      $(this).prev().attr('type','password');
    }
  });
  $(function() {
});
</script>
@endsection