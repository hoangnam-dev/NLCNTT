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
        <form action="{{ route('admin.users.admin-edit', ['MaNV'=>$user->MaNV]) }}" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name="adm_name" value="{{ $user->TenNV }}" placeholder="Nhập tên nhân viên...">
          </div>
          @error('adm_name')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" name="adm_phone" class="form-control" value="{{ $user->SoDienThoai }}" placeholder="Số điện thoại...">
          </div>
          @error('adm_phone')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="adm_email" class="form-control" value="{{ $user->Email }}" placeholder="Nhập Email...">
          </div>
          @error('adm_email')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="name" class="form-label">Mật khẩu đăng nhập</label>
            <div class="input-group-append">
              <input id="pass" type="password" name="adm_password" class="form-control" placeholder="Nhập mật khẩu..." value="{{ $user->MatKhau }}">
              <div class="input-group-text showPass">
                <span id="show" class="fas fa-eye"></span>
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
              <input id="pass" type="password" name="reenter_pass" class="form-control" placeholder="Nhập lại mật khẩu..." value="{{ old('reenter_pass') }}">
              <div class="input-group-text showPass">
                <span id="show" class="fas fa-eye"></span>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
            <div class="d-flex justify-content-start justify-content-lg-start align-items-center">
              <div class="form-check form-switch mr-4">
                <input class="form-check-input" name="adm_sex" value="Nam" type="checkbox" role="switch" {{ $user->GioiTinh=='Nam'?'checked':'' }}>
                <label class="form-check-label-label" for="flexSwitchCheckDefault">Nam</label>
              </div>
              <div class="form-check form-switch mr-4">
                <input class="form-check-input" name="adm_sex" value="Nữ" type="checkbox" role="switch" {{ $user->GioiTinh=='Nữ'?'checked':'' }}>
                <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Nữ</label>
              </div>
              <div class="form-check form-switch mr-4">
                <input class="form-check-input" name="adm_sex" value="Khác" type="checkbox" role="switch" {{ $user->GioiTinh=='Khác'?'checked':'' }}>
                <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Khác</label>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-2 mb-3">
            <button type="submit" name="prd_add_submit" class="btn btn-primary btn-block">Thêm mới</button>
          </div>
          <!-- /.col -->
          @csrf
          @method('PUT')
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
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