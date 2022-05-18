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
            <form action="{{ route('admin.products.comment-detail', ['mabl'=>$comment->mabl]) }}" method="POST"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->tensp }}">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh đại diện</label>
                    <div class="images">
                        <img src="{{ asset('assets/uploads/products').'/'.$product->avatar }}" class="img-fluid"
                            alt="{{ $product->avatar }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tài khoản đánh giá</label>
                    <textarea class="form-control" name="content" rows="3">{{ $customer->tenkh }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày đánh giá</label>
                    <input type="text" class="form-control" name="date"
                        value="{{ date_format(date_create($comment->ngaybl),'d-m-Y H:i:s') }}">
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Nội dung đánh giá</label>
                    <textarea name="comment" id="comment" class="form-control" cols="30"
                        rows="10">{{ $comment->noidung }}</textarea>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Phản hồi</label>
                    <textarea name="comment_reply" id="comment_reply" class="form-control" cols="30"
                        rows="10">{{ old('comment_reply') }}</textarea>
                </div>
                <!-- /.col -->
                <div class="col-2 mb-3">
                    <button type="submit" name="prd_edit_submit" class="btn btn-primary btn-block">Gửi phản hồi</button>
                </div>
                <!-- /.col -->
                @csrf
                @method('PUT')
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src={{ asset('assets/admin/ckeditor/ckeditor.js') }}></script>
<script>
    CKEDITOR.replace( 'comment_reply', {
      
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