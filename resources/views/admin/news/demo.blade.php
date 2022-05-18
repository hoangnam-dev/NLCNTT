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
    <form action="{{ route('admin.news.news-edit') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="matin" value="{{ $news->matin }}">
        <div class="mb-3">
            <label for="name" class="form-label">Tiêu đề tin tức</label>
            <input type="text" name="news_title" class="form-control" placeholder="Nhập tiêu đề..."
                value="{{ $news->tieude }}">
            @error('news_title')
            <div class="input-group">
                <p class="text-danger">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="name" class="form-label">Ngày đăng</label>
            <div class="form-control text-bold">{{ date_format(date_create($news->ngaydang),'d-m-Y H:i:s') }}</div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh tiêu đề</label>
            <div class="images">
                <img src="{{ asset('assets/uploads/news').'/'.$news->anh }}" class="img-fluid" alt="{{ $news->anh }}">
            </div>
            <input type="hidden" name="news_image" value="{{ $news->anh }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Thay đổi ảnh tiêu đề</label>
            <input class="form-control" type="file" name="news_avatar">
        </div>
        <div class="form-floating mb-3">
            <label for="floatingTextarea2">Nội dung</label>
            <textarea name="news_content" id="news_content" class="form-control" cols="30"
                rows="10">{{ $news->noidung }}</textarea>

        </div>
        <!-- /.col -->
        <div class="col-2">
            <button type="submit" name="create_news" class="btn btn-primary btn-block">Cập nhật</button>
        </div>

        @csrf
        @method('POST')
    </form>
</div>
@endsection