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
  <form action="{{ route('admin.attributes.attribute-create') }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tên tên thuộc tính</label>
      <input type="text" name="tentt" class="form-control" placeholder="Nhập tên tên thuộc tính..."
        value="{{ old('tentt') }}">
      @error('tentt')
      <div class="input-group">
        <p class="text-danger">{{ $message }}</p>
      </div>
      @enderror
    </div>
    {{-- <div class="mb-3">
      <label for="name" class="form-label">Giá trị thuộc tính</label>
      <input type="text" name="giatritt" class="form-control" placeholder="Nhập giá trị thuộc tính..."
        value="{{ old('giatritt') }}">
      @error('giatritt')
      <div class="input-group">
        <p class="text-danger">{{ $message }}</p>
      </div>
      @enderror
    </div> --}}
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_attribute" class="btn btn-primary btn-block">Thêm mới</button>
    </div>

  @csrf
  </form>
</div>
@endsection