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
        {{ session('status') }}
      </div>
      @endif
      <form action="{{ route('admin.promotions.promotion-edit', ['id'=>$promotion->id]) }}" class="col-4" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label class="form-label">Tên khuyến mãi</label>
          <input type="text" name="promotion_name" class="form-control" value="{{ $promotion->TenKM }}">
          @error('promotion_name')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Giá trị</label>
          <input type="text" name="promotion_value" class="form-control" value="{{ $promotion->GiaTri }}">
          @error('promotion_value')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Thời gian bắt đầu</label>
          <div class="d-flex">
            <input type="date" name="day_begin" class="form-control" value="{{ date_format(date_create($promotion->NgayBD),"Y-m-d") }}">
            <input type="time" name="time_begin" class="form-control" value="{{ date_format(date_create($promotion->NgayBD),"H:i") }}">
          </div>
          @error('day_begin')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          @error('time_begin')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Thời gian kết thúc</label>
          <div class="d-flex">
            <input type="date" name="day_end" class="form-control" value="{{ date_format(date_create($promotion->NgayKT),"Y-m-d") }}">
            <input type="time" name="time_end" class="form-control" value="{{ date_format(date_create($promotion->NgayKT),"H:i") }}">
          </div>
          @error('day_end')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          @error('time_end')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-3">
            <button type="submit" name="create_promotion" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection