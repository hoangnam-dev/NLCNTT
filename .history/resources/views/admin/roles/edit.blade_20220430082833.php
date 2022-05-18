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
      <form action="{{ route('admin.roles.role-edit', ['maquyen'=>$role->maquyen]) }}" class="col-6" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label class="form-label">Tên quyền</label>
          <input type="text" name="role_name" class="form-control" value="{{ $role->tenquyen }}">
          @error('role_name')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <label for="floatingTextarea2">Mô tả</label>
            <textarea name="role_description" id="description" class="form-control" cols="30"
                rows="10">{{ $role->mota }}</textarea>
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