@foreach ($comments as $comment)
<div class="comment-info d-flex mb-4">
    <div class="comment-user">
        <img src="{{ asset('assets/client/images/img-user.jpg') }}" alt="">
    </div>
    <div class="comment-container">
        <div class="comment-title d-flex ml-2">
            <h5 class="card-title">{{ $comment->hasUser->tenkh }}</h5>
            <div class="text-dark comment-time">{{ date_format(date_create($comment->ngaybl),'d-m-Y') }}</div>
        </div>
        <div class="form-group">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $comment->sosao)
                    <i class="fas fa-star start_rating"></i>
                @else
                    <i class="fas fa-star"></i>
                @endif
            @endfor
        </div>
        <div class="comment-content mb-2">
            <p class="card-text comment_content">{{ $comment->noidung }}</p>
        </div>
    </div>
</div>
@if (isset($comment->hasReplyComment->noidung))
<div class="comment-container reply-container mb-4">
    <div class="comment-title d-flex ml-2">
        <h5 class="card-title text-danger">Quản trị viên</h5>
        <div class="text-dark comment-time">{{ date_format(date_create($comment->hasReplyComment->ngaybl),'d-m-Y') }}</div>
    </div>
    <div class="comment-content mb-2">
        <p class="card-text comment_content">{!! $comment->hasReplyComment->noidung !!}</p>
    </div>
</div>
@endif
@endforeach
{{-- 
    <div class="card">
        <h5 class="card-header">Bình luận</h5>
        @if (session('status'))
        <div class="mx-2 my-2 alert alert-{{ session('status') }}">
            {{ session('sttContent') }}
        </div>
        @endif
        <form action="{{ route('client.product-detail.comment') }}" method="POST">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->masp }}">
            <div class="mt-3 mb-3 px-5">
                <textarea class="form-control" name="product_comment" id="exampleFormControlTextarea1" rows="3" placeholder="Viết bình luận của bạn"></textarea>
                <button type="submit" name="main_submit" class="mt-3 btn btn-danger" style="width: 90px">Gửi</button>
            </div>
        </form>
        <hr class="mt-3 mb-3">
        <div class="card-body"> --}}
            {{-- @foreach ($comments as $comment)
            <div class="comment-info d-flex mb-4">
                <div class="comment-user">
                    <img src="{{ asset('assets/client/images/img-user.jpg') }}" alt="">
                </div>
                <div class="comment-container">
                    <div class="comment-title d-flex ml-2">
                        <h5 class="card-title">{{ $comment->tenkh }}</h5>
                        <div class="text-dark comment-time">{{ date_format(date_create($comment->create_at),'d-m-Y') }}</div>
                    </div>
                    <div class="comment-content mb-2">
                        <p class="card-text comment_content">{{ $comment->noidung }}</p>
                    </div>
                    <div class="me-2 text-mute comment-reply">Trả lời</div>
                </div>
            </div>
            @endforeach --}}
        {{-- </div>  
    </div> --}}