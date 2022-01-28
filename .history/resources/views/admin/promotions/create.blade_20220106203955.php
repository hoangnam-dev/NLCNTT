@extends('admin.layouts.master')
@section('title')
    {{ $title }}    
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="ml-3">
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status')}}
      </div>
      @endif
          <form action="{{ route('admin.promotions.promotion-create') }}" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Tên khuyến mãi</label>
              <input type="text" name="promotion_name" class="form-control" placeholder="Nhập tên khuyến mãi..." value="{{ old('TenKM') }}">
              @error('promotion_name')
              <div class="mt-1">
                  <p class="text-danger">{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Giá trị</label>
              <input type="text" name="promotion_value" class="form-control" placeholder="Nhập giá trị khuyến mãi..." value="{{ old('GiaTri') }}">
              @error('promotion_value')
              <div class="mt-1">
                  <p class="text-danger">{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Ngày bắt đầu</label>
              <input type="datetime-local" name="promotion_begin" class="ml-3" value="{{ old('NgayBD') }}">
              @error('promotion_begin')
              <div class="mt-1">
                  <p class="text-danger">{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Ngày kết thúc</label>
              <input type="datetime-local" name="promotion_end" class="ml-3" value="{{ old('NgayKT') }}">
              @error('promotion_end')
              <div class="mt-1">
                  <p class="text-danger">{{ $message }}</p>
              </div>
              @enderror
            </div>
              <div class="col-3">
                <button type="submit" name="create_promotion" class="btn btn-primary btn-block">Thêm mới</button>
              </div>
            </div>
      
            @csrf
          </form>
    </div>
  </div>
</div>
@endsection