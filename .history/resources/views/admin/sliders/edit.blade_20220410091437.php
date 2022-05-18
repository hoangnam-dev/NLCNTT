@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="ml-3">
    @if (session('status'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('sttContent') }}
    </div>
    @endif
    <form action="{{ route('admin.sliders.slider-edit') }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Thay ảnh Slider</label>
            <input class="form-control" type="file" name="slider">
          </div>
        @error('slider')
        <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-floating mb-3">
            <label for="floatingTextarea2">Link</label>
            <input type="text" name="link" value="{{ old('link') }}">
        </div>
        <!-- /.col -->
        <div class="col-2">
            <button type="submit" name="create_slider" class="btn btn-primary btn-block">Thêm mới</button>
        </div>

        @csrf
        @method('POST')
    </form>
</div>
@endsection