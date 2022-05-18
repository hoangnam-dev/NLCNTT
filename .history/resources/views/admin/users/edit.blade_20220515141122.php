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
        <form action="{{ route('admin.users.admin-edit', ['manv'=>$user->manv]) }}" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name="adm_name" value="{{ $user->tennv }}" placeholder="Nhập tên nhân viên...">
          </div>
          @error('adm_name')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" name="adm_phone" class="form-control" value="{{ $user->sodienthoai }}" placeholder="Số điện thoại...">
          </div>
          @error('adm_phone')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="adm_email" class="form-control" value="{{ $user->email }}" placeholder="Nhập Email...">
          </div>
          @error('adm_email')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="name" class="form-label">Mật khẩu mới</label>
            <div class="input-group-append">
              <input type="password" name="adm_password" class="form-control" placeholder="Nhập mật khẩu mới..." value="{{ old('adm_password') }}" autocomplete="off">
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
          @error('reenter_pass')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="address">Địa chỉ</label>
            <div class="input-group-append">
              <input type="text" name="address" class="form-control" placeholder="Địa chỉ...">
            </div>
          </div>
          <div class="form-floating mb-3">
            <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
            <div class="form-floating mb-3">
              <label class="form-label" for="flexSwitchCheckDefault">Giới tính</label>
              <select class="form-control form-select d-block" name="category_id">
                <option value="1" {{ $user->gioitinh==1?'selected':'' }}>Nam</option>
                <option value="2" {{ $user->gioitinh==2?'selected':'' }}>Nữ</option>
              </select>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-2 mb-3">
            <button type="submit" name="prd_add_submit" class="btn btn-primary btn-block">Cập nhật</button>
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
  $('.showpasswd').on('click', function() {
    if($(this).children('i').hasClass('fa-eye-slash')){
      $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
      $(this).prev().attr('type','text');
    }else{
      $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
      $(this).prev().attr('type','password');
    }
  });
</script>
@endsection