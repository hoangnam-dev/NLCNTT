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
      <form action="{{ route('admin.categories.category-edit', ['madm'=>$category->madm]) }}" class="col-6" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label class="form-label">Tên danh mục</label>
          <input type="text" name="category_name" class="form-control" value="{{ $category->tendm }}">
          @error('category_name')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-3">
            <button type="submit" name="create_category" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection