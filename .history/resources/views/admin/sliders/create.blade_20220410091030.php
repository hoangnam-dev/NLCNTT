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
  <form action="{{ route('admin.sliders.slider-create') }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tên danh mục</label>
      <input type="text" name="slider" class="form-control" placeholder="Nhập tên danh mục..."
        value="{{ old('slider') }}">
      {{-- <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div> --}}
      @error('slider')
      <div class="input-group">
        <p class="text-danger">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_slider" class="btn btn-primary btn-block">Thêm mới</button>
    </div>

  @csrf
  </form>
</div>
@endsection