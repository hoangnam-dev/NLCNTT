@extends('client.layouts.master')
@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
<div class="container mt-3 bg-gradient-light border rounded p-3 order-detail_wrapper">
    @include('client.users.order.status-order')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
            {{ session('msg') }}
            </div>
            @endif
        </div>
    </div>
  {{-- <div class="d-flex justify-content-between"> --}}
    <div class="mt-1 address-delivery">
      <h4 class="addr-delivery_title title-font">Địa chỉ nhận hàng</h4>
      <div class="addr-delivery_content px-3">
        <div class="text-bold mb-1">{{ $customerOrd->tenkh }}</div>
        <div class="text-bold mb-1">{{ $order->diachi_gh }}</div>
        <div class="text-muted mb-1">{{ $customerOrd->sodienthoai }}</div>
        <div class="text-bold mb-1">Ngày đặt hàng:
          <span  style="font-weight: 500">{{ date_format(date_create($order->ngaydh),'d-m-Y H:i:s') }}</span>
        </div>
        <div>Ngày giao hàng: 
          <span  style="font-weight: 500">{{ !empty($order->ngaygh) ? date_format(date_create($order->ngaygh),'d-m-Y') : 'Đang xử lý' }}</span>
        </div>
      </div>
    </div>

    <div class="order-status">
      @if ($order->trangthai == 0)
          @php
              $status = 'wait';
              $sttContent = 'Chờ xác nhận'
          @endphp
      @elseif ($order->trangthai ==  1)
          @php
              $status = 'delivery';
              $sttContent = 'Đang giao'
          @endphp
      @else
          @php
              $status = 'success';
              $sttContent = 'Hoàn thành'
          @endphp
      @endif
      <div class="item-status item-status_{{ $status }}">
              {{ $sttContent }}
      </div>
    </div>
  {{-- </div> --}}
  <hr class="mt-3">
  <div class="mt-5 border border-light shadow-sm p-3 mb-5 bg-white rounded">
    <h4 class="title-font">Thông tin hàng hóa</h4>
    <table class="table cartData">
        <thead>
            <tr class="cart_menu">
                <td class="image">Ảnh sản phẩm</td>
                <td class="name">Tên sản phẩm</td>
                <td class="price">Giá bán</td>
                <td class="quantity">Số lượng</td>
                <td class="total">Thành tiền</td>
            </tr>
        </thead>
        <tbody class="cart-body">
            @foreach($orderDetail as $item )
            <tr class="cart_item">
                <input type="hidden" class="itemID" name="id" value="{{ $item->masp }}" data-token="{{ csrf_token() }}">
                <td>
                    <a href="{{ route('client.product-detail', ['masp'=>$item->masp]) }}"><img src="{{ asset('assets/uploads/products/'.$item->avatar) }}" alt=""class="cart_item-img"></a>
                </td>
                <td class="cart_description">
                    <h4><a class="text-decoration-none" style="color: #212529;" href="{{ route('client.product-detail', ['masp'=>$item->masp]) }}">{{ $item->tensp }}</a></h4>
                </td>
                <td class="cart_price">
                    <span class="text-black">{{ number_format($item->dongiaban,'0',',','.') }} VNĐ</span>
                </td>
                <td class="cart_quantity">{{ $item->soluongmua }}</div>
                    </div>
                </td>
                <td class="cart_subtotal">
                    <span class="cart_subtotal_price text-danger">{{ number_format($item->dongiaban * $item->soluongmua,'0',',','.') }} VNĐ</span>
                </td>
                <input type="hidden" class="prd_id" name="prd_id" value="{{ $item->masp }}">
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12 mt-3 cart-bottom d-flex justify-content-between">
        <div class="cart-total">
          Tổng cộng: 
          <span class="me-5 mx-4 text-danger">{{ number_format($order->tongtien,'0',',','.') }} VNĐ</span>
        </div>
        @if ($order->trangthai == 0)
        <a href="{{ route('client.user.order-destroy',['madh'=>$order->madh]) }}" class="btn btn-outline-dark">Hủy đơn</a>
        @endif
    </div>
</div>
</div>
@endsection