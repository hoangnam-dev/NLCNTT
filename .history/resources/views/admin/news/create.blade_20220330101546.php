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
  <form action="{{ route('admin.news.news-create') }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tiêu đề tin tức</label>
      <input type="text" name="news_title" class="form-control" placeholder="Nhập tiêu đề..."
        value="{{ old('news_title') }}">
      @error('news_title')
      <div class="input-group">
        <p class="text-danger">{{ $message }}</p>
      </div>
      @enderror
    </div>
   <div class="mb-3">
        <label for="formFile" class="form-label">Ảnh tiêu đề</label>
        <input class="form-control" type="file" name="news_avatar">
    </div>
    <div class="form-floating mb-3">
        <label for="floatingTextarea2">Nội dung</label>
        <textarea name="news_content" id="news_content" class="form-control" cols="30"
            rows="10">{{ old('news_content') }}</textarea>
    </div>
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_news" class="btn btn-primary btn-block">Thêm mới</button>
    </div>

  @csrf
  </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('news_content');
</script>
@endsection