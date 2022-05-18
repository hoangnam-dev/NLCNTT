@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
{{-- {{ dd($districts) }} --}}
<div class="container">
    <div class="py-3">
        <h3 class="border-bottom pb-3 mb-4">Xác nhận đặt hàng</h3>
    </div>
    @if (session('status'))
    <div class="alert alert-{{ session('status') }}">
      {{ session('msg') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Giỏ hàng</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                @php
                $total = 0;
                @endphp
                @foreach($carts as $id => $item )
                @php
                $total += $item['subtotal'];
                @endphp
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <img src="{{ asset('assets/uploads/products/'.$item['product_avatar']) }}" style="width: 50px"
                            alt="">
                        <h6 class="my-0">{{ $item['product_name'] }}</h6>
                        <small class="text-muted">x{{ $item['product_qty'] }}</small>
                    </div>
                    <span class="text-danger"> {{ number_format($item['subtotal'],'0',',','.') }} VNĐ</span>
                </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng tiền (VNĐ)</span>
                    <strong>{{ number_format($total,'0',',','.') }} VNĐ</strong>
                </li>
            </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Địa chỉ giao hàng</h4>
            <form class="needs-validation" novalidate action="{{ route('client.user.order') }}" method="POST">
                @csrf

                <input type="hidden" name="customerID" value="{{ Auth::user()->makh }}">
                <div class="mb-3">
                    <label for="validationCustomName">Họ tên khách hàng</label>
                    <input type="text" class="form-control" id="validationCustomName"
                        aria-describedby="inputGroupPrepend" name="customerName" required value="{{ Auth::user()->tenkh }}">
                    <div class="invalid-feedback">
                        hãy nhập tên khách hàng.
                    </div>
                </div>


                <div class="mb-3">
                    <label for="validationCustomPhone">Số điện thoại</label>
                    <input type="tel" class="form-control"  name="customerPhone" id="validationCustomPhone"
                        value="{{ Auth::user()->sodienthoai }}">
                    <div class="invalid-feedback">
                        Hãy nhập email để nhân thông báo về đơn hàng.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="validationCustomEmail">Email</label>
                    <input type="email" class="form-control"  name="customerEmail" id="validationCustomEmail"
                        value="{{ Auth::user()->email }}">
                    <div class="invalid-feedback">
                        Hãy nhập email để nhân thông báo về đơn hàng.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="validationCustomAddress" class="form-label">Địa chỉ giao hàng</label>
                    <div class="d-flex align-items-center">
                        <select class="form-select w-75"  name="customerAddr" id="validationCustomAddress" required>
                            @foreach ($Address as $addr)
                            <option value="{{ $addr->diachi.', '.$addr->ten_xp.', '.$addr->ten_qh.', '.$addr->ten_ttp }}">{{ $addr->diachi.', '.$addr->ten_xp.', '.$addr->ten_qh.', '.$addr->ten_ttp }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-dark flex-grow-1 text-center"  data-bs-toggle="modal" data-bs-target="#addAddressModal">Địa chỉ khác</button>
                    </div>
                </div>
{{-- 
                <hr class="mb-4">

                <h4 class="mb-3">Phương thức thanh toán</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="payOnDelivery" name="paymentMethod"  name="paymentMethod" type="radio" class="custom-control-input" checked
                            required>
                        <label class="custom-control-label" for="payOnDelivery">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="momopay" name="paymentMethod"  name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="momopay">Thanh toán qua MoMo</label>
                    </div>
                </div> --}}
                <hr class="mb-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-lg btn-block"
                        style="width: 150px" name="ord-submit" type="submit">Thanh toán
                    <button class="btn btn-danger btn-lg btn-block"
                        style="width: 150px" name="ord-submit" type="submit">Thanh toán MoMo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    @include('client.blocks.addAddress')

</div>
@endsection
{{-- @section('js')
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
@endsection --}}