<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nhập địa chỉ mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formLocation" action="{{ route('client.user.add-address') }}"  method="POST" data-url="{{ route('client.getlocation') }}">
                    @csrf
                    @method('POST')

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
                </form>
            </div>
        </div>
    </div>

    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nhập địa chỉ mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="formLocation" action="{{ route('client.user.add-address') }}"  method="POST" data-url="{{ route('client.getlocation') }}">
                @csrf
                @method('POST')

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <input type="submit" class="btn btn-primary" value="Thêm địa chỉ">
            </form>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div> --}}
        </div>
      </div>
</div>  
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
 --}}
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