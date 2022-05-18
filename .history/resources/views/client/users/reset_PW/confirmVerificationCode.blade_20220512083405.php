@extends('client.layouts.master2')
@section('title')
{{ $title }}
@endsection
@section('form-content')
<form action="{{ route('client.user.confirm-verification') }}" method="POST">
    @csrf
    @method('POST')

    <h3 class="text-center text-dark mb-4 title-font">Nhập mã xác nhận</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <p>Bạn hãy nhập vào mã xác nhận đã được gửi tới email <strong>{{ $customer_email }}</strong>.</p>
    </div>
    <input type="hidden" name="email_reset" value="{{ $customer_email }}">
    <div class="form-group">
        <input type="text" name="verification_code" class="form-control item" value="{{ old('verification_code') }}"
            placeholder="Mã xác nhận">
        @error('verification_code')
        <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" name="verification_submit" class="btn btn-block btnSubmit">Xác nhận</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.user.login') }}" class="btn btn-block btnBack">Hủy</a>
    </div>
    <div class="resend">Không nhận được mã? <a href="#" class="resend-link" data-url="{{ route('client.user.resend-code') }}">Gửi lại</a></div>

</form>
@endsection
@section('js')
    <script>
        $('.resend-link').click(function(e){
            e.preventDefault();
            var email = $('.item').val();
            var url = 
            $.ajax({
                url: '{{ route('client.user.resend-verification') }}',
                type: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data){
                    if(data.status == 'success'){
                        alert('Mã xác nhận đã được gửi tới email ' + email + '.');
                    }else{
                        alert('Gửi mã xác nhận thất bại.');
                    }
                }
            });
        });
    </script>
@endsection