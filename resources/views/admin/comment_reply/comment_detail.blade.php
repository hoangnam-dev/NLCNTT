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
            @if (isset($comment->hasReplyComment->noidung))
            <form action="{{ route('admin.comments.edit-reply', ['maph'=>$comment->hasReplyComment->mabl]) }}"
                method="POST">
                @csrf
                {{-- @method('PUT') --}}

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $comment->hasProduct->tensp }}">
                </div>
                <input type="hidden" name="masp" value="{{ $comment->hasProduct->masp }}">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                    <div class="images">
                        <img src="{{ asset('assets/uploads/products').'/'.$comment->hasProduct->avatar }}"
                            class="img-fluid" alt="{{ $comment->hasProduct->avatar }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tài khoản đánh giá</label>
                    <input type="text" class="form-control" name="name" value="{{ $comment->hasUser->tenkh }}">
                    <input type="hidden" name="makh" value="{{ $comment->hasUser->makh }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày đánh giá</label>
                    <input type="text" class="form-control" name="date"
                        value="{{ date_format(date_create($comment->ngaybl),'d-m-Y H:i:s') }}">
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Nội dung đánh giá</label>
                    <div class="mb-1">
                        @for ($i = 1; $i <= 5; $i++) 
                            @if ($i <=$comment->sosao)
                                <i class="fas fa-star" style="color: orange"></i>
                            @else
                                <i class="fas fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <textarea name="comment" id="comment" class="form-control" cols="30"
                        rows="10" readonly>{{ $comment->noidung }}</textarea>
                </div>

                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Phản hồi</label>
                    <textarea name="comment_reply" id="comment_reply" class="form-control" cols="30"
                        rows="10">{{ $comment->hasReplyComment->noidung }}</textarea>
                </div>
                <!-- /.col -->
                <div class="col-2 mb-3">
                    <button type="submit" name="prd_edit_submit" class="btn btn-primary btn-block">Sửa phản hồi</button>
                </div>
            </form>
            <div class="col-2 mb-3">
                <form action="{{ route('admin.comments.destroy-reply', ['mabl'=>$comment->hasReplyComment->mabl]) }}"
                    method="post">
                    @csrf

                    <button type="submit" name="prd_destroy_submit" class="btn btn-danger btn-block">Xóa phản
                        hồi</button>

                </form>
            </div>

            {{-- ===================== --}}
            @else
            <form action="{{ route('admin.comments.reply-comment') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $comment->hasProduct->tensp }}">
                </div>
                <input type="hidden" name="masp" value="{{ $comment->hasProduct->masp }}">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                    <div class="images">
                        <img src="{{ asset('assets/uploads/products').'/'.$comment->hasProduct->avatar }}"
                            class="img-fluid" alt="{{ $comment->hasProduct->avatar }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tài khoản đánh giá</label>
                    <input type="text" class="form-control" name="name" value="{{ $comment->hasUser->tenkh }}">
                    <input type="hidden" name="makh" value="{{ $comment->hasUser->makh }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày đánh giá</label>
                    <input type="text" class="form-control" name="date"
                        value="{{ date_format(date_create($comment->ngaybl),'d-m-Y H:i:s') }}">
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Nội dung đánh giá</label>
                    <div class="mb-1">
                        @for ($i = 1; $i <= 5; $i++) 
                            @if ($i <=$comment->sosao)
                                <i class="fas fa-star" style="color: orange"></i>
                            @else
                                <i class="fas fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <textarea name="comment" id="comment" class="form-control" cols="30"
                        rows="10" readonly>{{ $comment->noidung }}</textarea>
                </div>
                <input type="hidden" name="mabl" value="{{ $comment->mabl }}">

                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Phản hồi</label>
                    <textarea name="comment_reply" id="comment_reply" class="form-control" cols="30"
                        rows="10">{{ old('comment_reply')}}</textarea>
                </div>
                @error('comment_reply')
                <div class="input-group mb-3">
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
                <!-- /.col -->
                <div class="col-2 mb-3">
                    <button type="submit" name="comment_submit" class="btn btn-primary btn-block">Gửi phản hồi</button>
                </div>
                <!-- /.col -->
            </form>
            @endif
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