@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include('client.blocks.subSidebar')
    </div>
    <div class="col-md-9 col-sm-4  mx-auto bg-white px-5">
      <div class="col-lg-12">
        <h2 class="text-dark font-weight-bold mt-4 profile-title border-bottom p-2 title-font">Thông tin khách hàng</h2>
      </div>
      @if (session('status'))
      <div class="alert alert-{{ session('status') }}">
          {{ session('msg') }}
      </div>
      @endif
      <div class="content d-flex justify-content-center">
        <form action="{{ route('client.user.profile') }}" method="POST" class="mt-3 w-50">
          @csrf
          @method('POST')

          <input type="hidden" value="{{ $customer->makh }}" name="makh">
          <div class="form-group mb-3">
            <label for="exampleInputEmail1">Họ tên khách hàng</label>
            <input type="text" class="form-control" name="user_name" aria-describedby="name" 
              value="{{ $customer->tenkh }}">
            @error('user_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" class="form-control" name="user_phone" aria-describedby="phone"
              value="{{ $customer->sodienthoai }}">
            @error('user_phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="user_email" aria-describedby="emailHelp"
              value="{{ $customer->email }}">
            @error('user_email')
            <div class="alert alert-danger"></div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="address">Địa chỉ</label>
            <div class="d-flex align-items-center">
              <select class="form-select" name="user_address" aria-label="Default select example">
                @foreach ($Address as $addr)
                <option value="">{{ $addr->diachi.', '.$addr->ten_xp.', '.$addr->ten_qh.', '.$addr->ten_ttp }}</option>
                @endforeach
              </select>
              <button type="button" class="btn btn-outline-primary flex-grow-1 text-center" style="margin-left: 3px"
                data-bs-toggle="modal" data-bs-target="#addAddressModal">Thêm</button>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <div class="d-flex align-item-center">
              <input type="password" name="user_password" class="form-control" id="exampleInputPassword1"
                value="{{ old('user_password') }}">
              <div class="btn btn-outline-dark flex-grow-1 text-center showPass" style="margin-left: 3px">
                <i class="fa-solid fa-eye-slash"></i>
              </div>
              @error('user_password')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="user_gender" value="1" id="flexRadioDefault1" @if($customer->gioitinh == 1)
            {{ 'checked' }}
            @endif>
            <label class="form-check-label" for="flexRadioDefault1">
              Nam
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="user_gender" value="2" id="flexRadioDefault2" @if($customer->gioitinh == 2)
            {{ 'checked' }}
            @endif>
            <label class="form-check-label" for="flexRadioDefault2">
              Nữ
            </label>
          </div>
          <button type="submit" class="btn btn-primary mt-5">Cập nhật</button>
        </form>
      </div>
    </div>
  </div>
</div>
@include('client.blocks.addAddress')
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
      // alert('teadsst');
      // $('.dastest').click(function(){
      //   console.log('teasdst');
      // })
      
      $('.showPass').click(function(){
        if($(this).children('i').hasClass('fa-eye-slash')){
          $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
          $(this).prev().attr('type','text');
        }else{
          $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
          $(this).prev().attr('type','password');
        }
      });
    });
</script>
@endsection