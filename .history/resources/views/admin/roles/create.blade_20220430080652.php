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
  <form action="{{ route('admin.categories.category-create') }}" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Tên quyền</label>
      <input type="text" name="category_name" class="form-control" placeholder="Nhập tên danh mục..."
        value="{{ old('category_name') }}">
      @error('category_name')
      <div class="input-group">
        <p class="text-danger">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="floatingTextarea2">Mô tả</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
      </div>
    <!-- /.col -->
    <div class="col-2">
      <button type="submit" name="create_category" class="btn btn-primary btn-block">Thêm mới</button>
    </div>

  @csrf
  </form>
</div>
@endsection
@section('js')
<script src={{ asset('assets/admin/ckeditor/ckeditor.js') }}></script>
<script>
  CKEDITOR.replace( 'description', {
      
      filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
      filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
      filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
      filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
      filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
      filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
  } );
</script>
@include('ckfinder::setup')
@endsection