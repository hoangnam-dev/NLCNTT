@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
<form action="{{ route('client.user.register') }}" method="POST">
    @csrf

    <h3 class="text-center text-dark mb-4">Đăng ký tài khoản</h3>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    @if(session('status'))
        <p class="mb-3 alert alert-{{ session('status') }}">{{ session('message') }}</p>
    @endif
    <div class="form-group">
        <input type="text" class="form-control item" name="user_name" value="{{ old('user_name') }}" placeholder="Họ tên khách hàng">
        @error('user_name')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" name="user_password" value="{{ old('user_password') }}" placeholder="Mật khẩu">
        @error('user_password')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="user_email" value="{{ old('user_email') }}" placeholder="Email">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="user_phone" value="{{ old('user_phone') }}" placeholder="Số điện thoại">
        @error('user_phone')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        {{-- <input type="text" class="form-control item" name="user_address" value="{{ old('user_address') }}" placeholder="Địa chỉ"> --}}
        <div class="urlLocation" style="opacity: 0!important" data-url="{{ route('client.getlocation') }}"></div>
        <div class="mb-3">
            <label for="city" class="col-form-label">Số nhà/Tên đường:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="mb-3">
            <label for="city" class="col-form-label">Tỉnh/Thành phố:</label>
            <select class="form-select getLocation" id="city" name="city" data-type="city">
                <option>Mời bạn chọn Tỉnh/Thành phố</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id_ttp }}">{{ $city->ten_ttp }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="district" class="col-form-label">Quận/Huyện:</label>
            <select class="form-select getLocation" id="district" name="district" data-type="district">
                <option>Mời bạn chọn Quận/Huyện</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="street" class="col-form-label">Xã phường:</label>
            <select class="form-select getLocation" id="ward" name="ward" data-type="ward">
               <option>Mời bạn chọn Xã/Phường</option>
            </select>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <input type="submit" class="btn btn-primary" value="Thêm địa chỉ">  

        @error('user_address')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btnSubmit">Đăng ký</button>
    </div>
    <div class="form-group">
        <a href="{{ route('client.home') }}" class="btn btn-block btnBack">Trở lại</a>
    </div>
    <div class="form-group">
        <h6>Bạn đã có tài khoản?&nbsp;<a href="{{ route('client.user.login') }}" class="text-danger">Đăng nhập</a></h6>
    </div>
</form>
{{-- @include('client.blocks.addAddress') --}}
@endsection
@section('js')
    <script type="text/javascript">
        $(function() {

            $('.getLocation').change(function (e) { 
                e.preventDefault();
                var url = $('.formLocation').data('url');
                var id = $(this).val();
                var parent = $(this).data('type');
                // alert(id_ttp+' === '+ parent);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {'parent':parent, 'id':id},
                    success: function (response) {
                        let html = '';
                        let element = '';
                        if(parent == 'city') {
                            html = '<option>Mời bạn chọn Quận/Huyện</option>';
                            element = '#district';
                        }
                        else  {
                            
                            html = '<option>Mời bạn chọn Xã/Phường</option>';
                            element = '#ward';
                        }
                        if(response.type == 'district') {
                            $.each(response.data, function (index, value) { 
                                html += "<option value='"+value.id_qh+"'>"+value.ten_qh+"</option>";
                            });
                            // alert(1);
                        }
                        else if(response.type == 'ward') {
                            $.each(response.data, function (index, value) { 
                                html += "<option value='"+value.id_xp+"'>"+value.ten_xp+"</option>";
                            });
                            // alert(2)
                        }
                        // alert(id+'  '+name);
                        $(element).html('').append(html);
                    }
                });
            });
        });
    </script>
@endsection