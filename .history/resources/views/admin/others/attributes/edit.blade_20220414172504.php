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
      <form action="{{ route('admin.attributes.attribute-edit', ['madm'=>$attribute->madm]) }}" class="col-6" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label for="name" class="form-label">Tên tên thuộc tính</label>
          <input type="text" name="tentt" class="form-control" placeholder="Nhập tên tên thuộc tính..."
            value="{{ $attribute->tentt }}">
          @error('tentt')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-3">
            <button type="submit" name="create_attribute" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection